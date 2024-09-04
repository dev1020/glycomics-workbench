<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function __construct()
    {
        //$this->authorizeResource(Page::class, 'page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,)
    {

        $pages = Page::query();

        if (!!$request->trashed) {
            $pages->withTrashed();
        }

        if (!empty($request->search)) {
            $pages->where('title', 'like', '%' . $request->search . '%');
        }

        $pages = $pages->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {

        $request->validate(["title" => "required", "meta_keywords" => "nullable", "meta_description" => "nullable", "body" => "required"]);

        try {
            //Prepare The Page Slug
            $slug = Str::slug($request->title);

            $page = new Page();
            $page->title = $request->title;
            $page->meta_keywords = $request->meta_keywords;
            $page->meta_description = $request->meta_description;
            $page->page_layout = $request->page_layout;
            $page->slug = $slug;
            $page->body = $request->body;
            $page->save();

            return redirect()->route('pages.index', [])->with('success', __('Page created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('pages.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page,)
    {

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page,)
    {

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page,)
    {

        $request->validate(["title" => "required", "meta_keywords" => "nullable", "meta_description" => "nullable", "body" => "required"]);

        try {
            $slug = Str::slug($request->title);

            $page->title = $request->title;
            $page->meta_keywords = $request->meta_keywords;
            $page->meta_description = $request->meta_description;
            $page->page_layout = $request->page_layout;
            $page->slug = $slug;
            $page->body = $request->body;
            $page->save();

            return redirect()->route('pages.index', [])->with('success', __('Page edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('pages.edit', compact('page'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page,)
    {

        try {
            $page->delete();

            return redirect()->route('pages.index', [])->with('success', __('Page deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('pages.index', [])->with('error', 'Cannot delete Page: ' . $e->getMessage());
        }
    }

    //@softdelete

    /**
     * Restore the specified deleted resource from storage.
     *
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(int $page_id,)
    {

        $page = Page::withTrashed()->find($page_id);
        $this->authorize('delete', [Page::class, $page]);

        if (!empty($page)) {
            $page->restore();
            return redirect()->route('pages.index', [])->with('success', __('Page restored successfully'));
        } else {
            return redirect()->route('pages.index', [])->with('error', 'Page not found');
        }
    }

    public function purge(int $page_id,)
    {

        $page = Page::withTrashed()->find($page_id);
        $this->authorize('delete', [Page::class, $page]);

        if (!empty($page)) {
            $page->forceDelete();
            return redirect()->route('pages.index', [])->with('success', __('Page purged successfully'));
        } else {
            return redirect()->route('pages.index', [])->with('error', __('Page not found'));
        }
    }
    public function uploadImagesTinymce(Request $request){
//        $fileName=$request->file('file')->getClientOriginalName();
//        $path=$request->file('file')->storeAs('uploads/pages', $fileName, 'public');
//        return response()->json(['location'=>"$path"]);

        $imgpath = request()->file('file')->store('uploads/pages', 'public');
        return response()->json(['location' => asset('storage/'.$imgpath)]);

    }
    //@endsoftdelete
}
