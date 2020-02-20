<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Communication;
use App\Communicators;
use App\Http\Controllers\Controller;
use App\LetterType;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $c = new Communication();
        if($id !== -1)
        {
            $lt = Communication::find($id);
        }

        $c->communicator_id =  $request['source_id'];
        $c->letter_type_id =  $request['letterType_id'];
        $c->subject =  $request['subject'];
        $c->notes =  $request['notes'];
        $c->actionDate =  $request['actionDate'];
        $c->in =  $request['in'];
        $c->user_id = Auth::id() ;
        $c->internal_id =  $request['internal_id'];


        //HANDLE NEW LETTER TYPE

        if($c->communicator_id == -1)
        {
            $lt = new Communicators();

            $lt->phone = $request['phone'];
            $lt->email = $request['email'];

            $lt->address = $request['address'];
            $lt->fax = $request['fax'];
            $lt->name = $request['name'];
            $lt->contactName = $request['contactName'];
            $lt->mobile = $request['mobile'];

            $lt->push();

            $c->communicator_id = $lt->id;
        }
        if($c->letter_type_id== -1)
        {
            $lt = new LetterType();
            $lt->englishName = $request['englishName'];
            $lt->arabicName = $request['englishName'];
            $lt->push();
            $c->letter_type_id = $lt->id;
        }


        // HANDLE NEW DESTINATION



        if($request->file('attachemnt1'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt1');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $c->attachemnt1 =  asset('storage/'.$name);
        }

        if($request->file('attachemnt2'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt2');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $c->attachemnt2 =  asset('storage/'.$name);
        }

        if($request->file('attachemnt3'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt3');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $c->attachemnt3 =  asset('storage/'.$name);
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
