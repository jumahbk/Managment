<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Vendor::all();

        return view('vendors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('vendors.batch');

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
        return redirect('/vendors');



    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $request = Vendor::find($id);
        $request->deleted = false;
        $request->push();
        return redirect('/vendors');



    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $vendor = Vendor::find($id);
        $vendor->deleted = true;
        $vendor->push();

        return redirect('/vendors');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);
        $data = $vendor->products;
        $d=$vendor;
        return view('vendors.show', compact('d','data' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($vendor)
    {

        $d=$vendor;
        return view('vendors.edit', compact('d' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $this->save($request, $vendor->id);
        return redirect('/vendors');
    }
    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d)
        {

            $tokens = explode(";", $d);
            $vendor = new Vendor();
            $vendor->englishName = $tokens[0];
            $vendor->arabicName = $tokens[1];
            $vendor->push();

        }

        redirect('/vendors');

    }
    public function save(Request $request, $id)
    {
        if($request['batch'] == 1)
        {
            return $this->saveBatch($request);
        }
        $vendor = new Vendor();
        if($id !== -1)
        {
            $vendor = Vendor::find($id);
        }
        $vendor->englishName = $request['englishName'];
        $vendor->arabicName = $request['arabicName'];

        $vendor->phone = $request['phone'];
        $vendor->cr = $request['cr'];


        $vendor->contactName = $request['contactName'];
        $vendor->mobile = $request['mobile'];


        $vendor->contactName2 = $request['contactName2'];
        $vendor->mobile2 = $request['mobile2'];

        $vendor->push();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete = true;
        $vendor->push();
        redirect('/vendors');

        //
    }
}
