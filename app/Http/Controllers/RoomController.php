<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Department;
use App\Room;
use App\Employee;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('rooms.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $branches = Branch::all();
        $employees = Department::all();
        return view('rooms.create' ,  compact( 'companies','branches', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->save($request, -1);
        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function save(Request $request, $id)
    {

        $room = new Room();
        if($id !== -1)
        {
            $room = Room::find($id);
        }
        $room->englishName = $request['englishName'];
        $room->arabicName = $request['arabicName'];
        $room->department_id = $request['department_id'];
        $room->branch_id = $request['branch_id'];

        $room->push();

        return redirect('/rooms');



    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = Room::find($id);
        $companies = Company::all();
        $branches = Branch::all();
        $employees = Department::all();
        return view('rooms.edit' ,  compact( 'd', 'companies','branches', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        return $this->save($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->updateDeleted($id, 1);
    }

    public function updateDeleted($id, $value)
    {
        $d = Room::find($id);
        $d->deleted = $value;
        $d->push();
        return redirect('/rooms/');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $id = $request['id'];
        return  $this->updateDeleted($id, 0);
    }
}
