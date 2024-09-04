<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller {

    public function __construct() {
		//$this->authorizeResource(Permission::class, 'permission');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $permissions = Permission::query();

        if(!empty($request->search)) {
			$permissions->where('name', 'like', '%' . $request->search . '%');
		}

        $permissions = $permissions->paginate(10);

        return view('admin.roles-permissions.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.roles-permissions.permissions.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["name" => "required",]);

        try {
            Permission::create(['name'=>$request->name,]);

            return redirect()->route('permissions.index', [])->with('success', __('Permission created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('permissions.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Permission $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission,) {

        return view('admin.roles-permissions.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Permission $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission,) {

        return view('admin.roles-permissions.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission,) {

        $request->validate(["name" => "required", "guard_name" => "required"]);

        try {
            $permission->name = $request->name;
		$permission->guard_name = $request->guard_name;
            $permission->save();

            return redirect()->route('permissions.index', [])->with('success', __('Permission edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('permissions.edit', compact('permission'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Permission $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission,) {

        try {
            $permission->delete();

            return redirect()->route('permissions.index', [])->with('success', __('Permission deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('permissions.index', [])->with('error', 'Cannot delete Permission: ' . $e->getMessage());
        }
    }


}
