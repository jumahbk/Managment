<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Role::all();

        return view('roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('roles.batch');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->save($request, -1);
        return redirect('/roles');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $t)
    {

        return view('roles.edit', compact('t', 't'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->save($request, $role->id);
        return redirect('/roles');
    }

    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d) {

            $tokens = explode(",", $d);
            $role = new Role();
            $role->englishName = $tokens[0];
            $role->arabicName = $tokens[1];
            $role->push();

        }

        redirect('/roles');

    }

    public function save(Request $request, $id)
    {
        if ($request['batch'] == 1) {
            return $this->saveBatch($request);
        }
        $role = new Role();
        if ($id !== -1) {
            $role = Role::find($id);
        }
        $role->englishName = $request['englishName'];
        $role->arabicName = $request['arabicName'];

        $role->push();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete = true;
        $role->push();
        redirect('/roles');

        //
    }
}
