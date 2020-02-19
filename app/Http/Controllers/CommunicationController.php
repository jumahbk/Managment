<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Http\Controllers\Controller;
use App\LetterType;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $t = 'قائمة انواع الخطابات';

        $data = LetterType::all();

        return View('lettertypes.index', compact('data', 't'));
    }



    public function create()
    {
        $t = 'انشاء صادر جديد';
        $currentMonth = date('m');
        $currentyear = date('Y');
        $currentDate = date('d');
        $inid = $currentyear . '/' .$currentMonth .'/' . $currentDate . '/' . date('His');

        return View('coms.create', compact('t', 'inid'));
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
        return redirect('/lettertypes');
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

        $lt = new LetterType();
        if($id !== -1)
        {
            $lt = Bank::find($id);
        }
        $lt->englishName = $request['englishName'];
        $lt->arabicName = $request['englishName'];


        $lt->push();

        return redirect('/lettertypes');



    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = Bank::find($id);

        return view('banks.edit' ,  compact( 'd'));
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
        LetterType::destroy($id);
        return redirect('/lettertypes');
    }

    public function updateDeleted($id, $value)
    {
        $d = Bank::find($id);
        $d->deleted = $value;
        $d->push();
        return redirect('/banks/');
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
