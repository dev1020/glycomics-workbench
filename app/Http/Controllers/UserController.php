<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function index(Request $request ) {

        $users = User::query();

        if(!empty($request->search)) {
            $users->where('name', 'like', '%' . $request->search . '%');
        }

        $users = $users->paginate(10);

        return view('admin.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.users.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' =>'string|required|min:6',
        ]);

        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->otp_token='';
            $user->save();

            return redirect()->route('users.index', [])->with('success', __('User created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {

        $request->validate(["name" => "required"]);

        try {
            $user->name = $request->name;
            $user->two_factor_auth = $request->two_factor_auth;
            $user->otp_token='';
            $user->save();

            return redirect()->route('users.index', [])->with('success', __('User edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {

        try {
            $user->delete();

            return redirect()->route('users.index', [])->with('success', __('User deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.index', [])->with('error', 'Cannot delete User: ' . $e->getMessage());
        }
    }
    public function assignRoleToUser($userId){
        $roles = Role::all();
        $user = User::findOrFail($userId);
        $userRoles = DB::table('model_has_roles')
            ->where('model_has_roles.model_id', $userId)
            ->pluck('model_has_roles.role_id')
            ->all();
        return view('admin.users.assign-role',[
            'roles'=>$roles,
            'user'=>$user,
            'userRoles'=>$userRoles,
        ]);
    }
    public function saveRoleToUser(Request $request,$userId){
        $user = User::findOrFail($userId);
        $user->syncRoles($request->roles);
        return redirect()->back()->with('success', 'Roles Assigned to User');
    }
}
