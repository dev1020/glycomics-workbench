<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller {

    public function __construct() {
		//$this->authorizeResource(Slider::class, 'slider');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $slider = Slider::query();

        if(!empty($request->search)) {
			$slider->where('title', 'like', '%' . $request->search . '%');
		}

        $slider = $slider->paginate(10);

        return view('admin.sliders.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.sliders.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate([
            "title" => "required",
            "author" => "required",
            "topic" => "nullable",
            "slider_image" => "required|mimes:png,jpg,jpeg,webp",
            "slider_thumbnail" => "required|mimes:png,jpg,jpeg,webp",
            "description" => "required",
            "read_more_url" => "nullable",
            "slider_visible" => "required"]);

        try {
            // Upload slider_image
            if($request->has('slider_image')){
                $sliderImageFile = $request->file('slider_image');
                $sliderImageExtension = $sliderImageFile->getClientOriginalExtension();
                $sliderImageFilename = time().'.'.$sliderImageExtension;
                $path = 'uploads/sliders/';
                $sliderImageFile->move($path,$sliderImageFilename);
            }
            // Upload slider_thumbnail
            if($request->has('slider_thumbnail')){
                $sliderThumbnailFile = $request->file('slider_thumbnail');
                $sliderThumbnailExtension = $sliderThumbnailFile->getClientOriginalExtension();
                $sliderThumbnailFilename = 't'.time().'.'.$sliderThumbnailExtension;
                $path = 'uploads/sliders/';
                $sliderThumbnailFile->move($path,$sliderThumbnailFilename);
            }
            $slider = new Slider();
            $slider->title = $request->title;
		$slider->author = $request->author;
		$slider->topic = $request->topic;
		$slider->slider_image = $path.$sliderImageFilename;
		$slider->slider_thumbnail = $path.$sliderThumbnailFilename;
		$slider->description = $request->description;
		$slider->read_more_url = $request->read_more_url;
		$slider->slider_visible = $request->slider_visible;
            $slider->save();

            return redirect()->route('sliders.index', [])->with('success', __('Slider created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('sliders.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Slider $slider
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider,) {

        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Slider $slider
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider,) {

        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider,) {

        $request->validate([
            "title" => "required",
            "author" => "required",
            "topic" => "nullable",
            "slider_image" => "nullable|mimes:png,jpg,jpeg,webp",
            "slider_thumbnail" => "nullable|mimes:png,jpg,jpeg,webp",
            "description" => "required",
            "read_more_url" => "required",
            "slider_visible" => "required"]);

        try {

            // Upload slider_image
            if($request->has('slider_image')){
                $sliderImageFile = $request->file('slider_image');
                $sliderImageExtension = $sliderImageFile->getClientOriginalExtension();
                $sliderImageFilename = time().'.'.$sliderImageExtension;
                $path = 'uploads/sliders/';
                $sliderImageFile->move($path,$sliderImageFilename);
                if(File::exists($slider->slider_image)){
                    File::delete($slider->slider_image);
                }
            }
            // Upload slider_thumbnail
            if($request->has('slider_thumbnail')){
                $sliderThumbnailFile = $request->file('slider_thumbnail');
                $sliderThumbnailExtension = $sliderThumbnailFile->getClientOriginalExtension();
                $sliderThumbnailFilename = 't'.time().'.'.$sliderThumbnailExtension;
                $path = 'uploads/sliders/';
                $sliderThumbnailFile->move($path,$sliderThumbnailFilename);
                if(File::exists($slider->slider_thumbnail)){
                    File::delete($slider->slider_thumbnail);
                }
            }


            $slider->title = $request->title;
            $slider->author = $request->author;
            $slider->topic = $request->topic;
            if($request->has('slider_thumbnail')){
                $slider->slider_thumbnail = $path.$sliderThumbnailFilename;
            }
            if($request->has('slider_image')){
                $slider->slider_image = $path.$sliderImageFilename;
            }


            $slider->description = $request->description;
            $slider->read_more_url = $request->read_more_url;
            $slider->slider_visible = $request->slider_visible;
            $slider->save();

            return redirect()->route('sliders.index', [])->with('success', __('Slider edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('sliders.edit', compact('slider'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Slider $slider
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider,) {

        try {
            $slider->delete();

            return redirect()->route('sliders.index', [])->with('success', __('Slider deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('sliders.index', [])->with('error', 'Cannot delete Slider: ' . $e->getMessage());
        }
    }


}
