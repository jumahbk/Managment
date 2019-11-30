<?php

namespace App\Http\Controllers;

use App\Nationality;
use App\Problem;
use App\Stock;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index()
    {
        $ps = Problem::all();

        return view('problems.index', compact('ps'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Problem();
        $p->user_id = Auth()->user()->id;
        $p->issue = $request['issue'];

        $p->push();
        return redirect('/problems');



    }
    public function update(Request $request, $id)
    {

        $p = Problem::find($id);

        $p->answer = $request['answer'];
        $p->done = true;

        $p->push();

        return redirect('/problems');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Problem::find($id);
        return view('problems.edit', compact('p'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('problems.create');

    }
}
