<?php

namespace App\Http\Controllers;
use Storage;
use App\Bank;
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
        //
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
        $this->save($request, -1);
   //     return redirect('/banks');
    }




    public function save(Request $request, $id)
    {

        $file = $request->file('attachemnt1');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
        Storage::disk('local')->putFile('storage/test.pdf', $file);
//        Storage::disk('local')->putFile()
        echo asset('storage/test.pdf');



        //Move Uploaded File
       // $destinationPath = '/storage';
       // $file->move($destinationPath,$file->getClientOriginalName());
        if($file)
        {
            return;
        }




        $deviceContract = new Devicecontract();
        if($id !== -1)
        {
            $deviceContract = Devicecontract::find($id);
        }
        $deviceContract->details = $request['details'];
        $deviceContract->startDate = $request['startDate'];
        $deviceContract->endDate = $request['endDate'];
        $deviceContract->amount = $request['amount'];

        $deviceContract->device_id = $request['device_id'];

        $deviceContract->push();

     //   return redirect('/devices');



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
