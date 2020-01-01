<?php

namespace App\Http\Controllers;

use App\Role;
use App\Stockrole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $sr = Stockrole::all();
        $r = Role::all();
        return view('users.index', compact('users', 'r', 'sr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sr = Stockrole::all();
        $r = Role::all();
        return view('users.create', compact('sr', 'r'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $user = User::find($id);
        $user->disabled = 1;
        $user->push();
        return redirect('/users');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $user = User::find($id);
        $user->disabled = 0;
        $user->push();
        return redirect('/users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = Hash::make($request['password']);
        $name = $request['name'];
        $email =$request['email'];
        $role_id =$request['role_id'];
        $stockrole_id =$request['stockrole_id'];

        $user = new User();
        $user->name = $name;
        $user->password = $password;
        $user->email = $email;
        $user->role = $role_id;
        $user->stock_request_role = $stockrole_id;
        $user->push();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $sr = Stockrole::all();
        $r = Role::all();

        return view('users.edit', compact('sr', 'r', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $password= '';
        if($request['password']) {
            $password = Hash::make($request['password']);
        }
        $name = $request['name'];
        $email =$request['email'];
        $role_id =$request['role_id'];
        $stockrole_id =$request['stockrole_id'];

        $user->name = $name;
        if($request['password']) {
            $user->password = $password;
        }
        $user->email = $email;
        $user->role = $role_id;
        $user->stock_request_role = $stockrole_id;
        $user->push();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
