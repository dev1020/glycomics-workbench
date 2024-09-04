<?php

namespace App\Http\Controllers;

use App\Models\Permission;

//use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        //$this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,)
    {

        $roles = Role::query();

        if (!empty($request->search)) {
            $roles->where('name', 'like', '%' . $request->search . '%');
        }

        $roles = $roles->paginate(10);

        return view('admin.roles-permissions.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.roles-permissions.roles.create', []);
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

        $request->validate(["name" => "required"]);

        try {
            Role::create(['name' => $request->name]);

            return redirect()->route('roles.index', [])->with('success', __('Role created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('roles.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role,)
    {

        return view('admin.roles-permissions.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role,)
    {

        return view('admin.roles-permissions.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role,)
    {

        $request->validate(["name" => "required",]);

        try {
            $role->name = $request->name;

            $role->save();

            return redirect()->route('roles.index', [])->with('success', __('Role edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('roles.edit', compact('role'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role,)
    {

        try {
            $role->delete();

            return redirect()->route('roles.index', [])->with('success', __('Role deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('roles.index', [])->with('error', 'Cannot delete Role: ' . $e->getMessage());
        }
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $roleId)
            ->pluck('role_has_permissions.permission_id')
            ->all();
        return view('admin.roles-permissions.roles.give-permission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions'=>$rolePermissions
        ]);
    }

    public function savePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            //'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success', 'Permissions Status Updated to role');
    }

}
