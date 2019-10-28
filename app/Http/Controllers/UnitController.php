<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Unit::all();

        return view('units.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('units.batch');

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
        return redirect('/units');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $Unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $t)
    {

        return view('units.edit', compact('t','t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $Unit)
    {
        $this->save($request, $Unit->id);
        return redirect('/units');
    }
    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d)
        {

            $tokens = explode(",", $d);
            $Unit = new Unit();
            $Unit->englishName = $tokens[0];
            $Unit->arabicName = $tokens[1];
            $Unit->push();

        }

        redirect('/units');

    }
    public function save(Request $request, $id)
    {
        if($request['batch'] == 1)
        {
            return $this->saveBatch($request);
        }
        $Unit = new Unit();
        if($id !== -1)
        {
            $Unit = Unit::find($id);
        }
        $Unit->englishName = $request['englishName'];
        $Unit->arabicName = $request['arabicName'];

        $Unit->push();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $Unit)
    {
        $Unit->delete = true;
        $Unit->push();
        redirect('/units');

        //
    }
}
