<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Warehouse;
use App\Company;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Warehouse::all();
        return view('warehouses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Branch::all();
        return view('warehouses.create' ,  compact( 'companies'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('warehouses.batch');

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
        return redirect('/warehouses');



    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $request = Warehouse::find($id);
        $request->deleted = false;
        $request->push();
        return redirect('/warehouses');



    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->deleted = true;
        $warehouse->push();

        return redirect('/warehouses');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Branch::all();
        $wa = Warehouse::find($id);
        return view('/warehouses.edit', compact('companies','wa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $this->save($request, $warehouse->id);
        return redirect('/warehouses');
    }
    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d)
        {

            $tokens = explode(";", $d);
            $warehouse = new Warehouse();
            $warehouse->englishName = $tokens[0];
            $warehouse->arabicName = $tokens[1];
            $warehouse->push();

        }

        redirect('/warehouses');

    }
    public function save(Request $request, $id)
    {
        if($request['batch'] == 1)
        {
            return $this->saveBatch($request);
        }
        $warehouse = new Warehouse();
        if($id !== -1)
        {
            $warehouse = Warehouse::find($id);
        }
        $warehouse->englishName = $request['englishName'];
        $warehouse->arabicName = $request['arabicName'];
        $warehouse->branch_id = $request['branch_id'];

        $warehouse->push();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete = true;
        $warehouse->push();
        redirect('/warehouses');

        //
    }
}
