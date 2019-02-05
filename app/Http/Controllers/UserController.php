<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $roles = Role::all();
        return view('user.user-create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $nu = new User;
        $nu->email = $request->email;
        $nu->password = bcrypt($request->password);
        $nu->role_id = $request->role;
        $nu->save();
        $users = User::all();
        return view('user.user', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $role = DB::table('roles')->where('id', $user->role_id)->get()->first();
        return view('user.user-show', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::all();
        return view('user.user-edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = bcrypt($request->password);
        };
        if(isset($request->role)){
            $user->role_id = $request->role;
        }
        $user->save();
        $users = User::all();
        return view('user.user', compact('users'));        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $c = Profile::where('user_id', $user->id);
        if($c->count() == 1){
            $c->delete();
        }
        $user->delete();

        $users = User::all();
        return view('user.user', compact('users')); 
    }
}
