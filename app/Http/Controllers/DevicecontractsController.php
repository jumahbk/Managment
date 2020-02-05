<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Date;
use Storage;
use App\Bank;
use DateTime;
use App\Device;
use App\Devicecontract;
use Illuminate\Http\Request;

class DevicecontractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Devicecontract::all();
        return View('dcontracts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $device_id = $id;
        $device = Device::find($id);

        return view('dcontracts.create', compact('device','device_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request, -1);
   //     return redirect('/banks');
    }




    public function save(Request $request, $id)
    {

        $deviceContract = new Devicecontract();
        if($id !== -1)
        {
            $deviceContract = Devicecontract::find($id);
        }
        $deviceContract->details = $request['details'];
        $deviceContract->startDate = $request['startDate'];
        $deviceContract->endDate = $request['endDate'];
        if($request->amount){
            $deviceContract->amount = $request['amount'];

        }else
        {
            $request->amount = 0;
        }
        $deviceContract->device_id = $request['device_id'];

        if($request->file('attachemnt1'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt1');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $deviceContract->attachemnt1 =  asset('storage/'.$name);
        }

        if($request->file('attachemnt2'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt2');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $deviceContract->attachemnt2 =  asset('storage/'.$name);
        }

        if($request->file('attachemnt3'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt3');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $deviceContract->attachemnt3 =  asset('storage/'.$name);
        }

        $deviceContract->push();

      return redirect('/devices/'. $request['device_id']);



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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
