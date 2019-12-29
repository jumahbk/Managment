<?php

namespace App\Http\Controllers;

use App\Stockrole;
use Illuminate\Http\Request;

class StockroleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $data = Stockrole::all();

        return view('stockroles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stockroles.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('stockroles.batch');

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
        return redirect('/stockroles');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Stockrole $stockrole
     * @return \Illuminate\Http\Response
     */
    public function show(Stockrole $stockrole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Stockrole $stockrole
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockrole $t)
    {

        return view('stockroles.edit', compact('t', 't'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Stockrole $stockrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockrole $stockrole)
    {
        $this->save($request, $stockrole->id);
        return redirect('/stockroles');
    }

    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d) {

            $tokens = explode(",", $d);
            $stockrole = new Stockrole();
            $stockrole->englishName = $tokens[0];
            $stockrole->arabicName = $tokens[1];
            $stockrole->push();

        }

        redirect('/stockroles');

    }

    public function save(Request $request, $id)
    {
        if ($request['batch'] == 1) {
            return $this->saveBatch($request);
        }
        $stockrole = new Stockrole();
        if ($id !== -1) {
            $stockrole = Stockrole::find($id);
        }
        $stockrole->englishName = $request['englishName'];
        $stockrole->arabicName = $request['arabicName'];

        $stockrole->push();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Stockrole $stockrole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockrole $stockrole)
    {
        $stockrole->delete = true;
        $stockrole->push();
        redirect('/stockroles');

        //
    }
}
