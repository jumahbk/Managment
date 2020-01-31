<?php

namespace App\Http\Controllers;

use App\Device;
use App\Branch;
use App\Company;
use App\Department;
use App\Room;
use App\Vendor;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Device::all();
        return view('devices.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $vendors = Vendor::all();
        $departments = Department::all();
        return view('devices.create' ,  compact( 'rooms','vendors', 'departments'));
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
        return redirect('/devices');
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

        $device = new Device();
        if($id !== -1)
        {
            $device = Device::find($id);
        }
        $device->englishName = $request['englishName'];
        $device->arabicName = $request['arabicName'];
        $device->room_id = $request['room_id'];
        $device->department_id = $request['department_id'];

        $device->vendor_id = $request['vendor_id'];
        $device->purchased = $request['purchased'];

        $device->warranty = $request['warranty'];

        $device->push();

        return redirect('/devices');



    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = Device::find($id);

        return view('devices.edit' ,  compact( 'd'));
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
        $d = Device::find($id);
        $d->deleted = $value;
        $d->push();
        return redirect('/devices/');
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
