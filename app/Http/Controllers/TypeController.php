<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Type::all();

        return view('types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('types.batch');

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
        return redirect('/types');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $t)
    {

        return view('types.edit', compact('t','t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->save($request, $type->id);
        return redirect('/types');
    }
    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d)
        {

            $tokens = explode(";", $d);
            $type = new Type();
            $type->englishName = $tokens[0];
            $type->arabicName = $tokens[1];
            $type->push();

        }

        redirect('/type');

    }
    public function save(Request $request, $id)
    {
        if($request['batch'] == 1)
        {
            return $this->saveBatch($request);
        }
        $type = new Type();
        if($id !== -1)
        {
            $type = Type::find($id);
        }
        $type->englishName = $request['englishName'];
        $type->arabicName = $request['arabicName'];

        $type->push();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete = true;
        $type->push();
        redirect('/types');

        //
    }
}
