<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Communicators;
use App\Http\Controllers\Controller;
use App\LetterType;
use DateTime;
use Illuminate\Http\Request;
use Storage;

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
        $currentyear = date('y');
        $currentDate = date('d');
        $inid = $currentMonth .'/' . $currentDate . '/' . date('s') .''. rand(1,9);

        $dests = Communicators::all();
        $ltypes = LetterType::all();

        return View('coms.create', compact('t', 'inid','dests', 'ltypes'));
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
