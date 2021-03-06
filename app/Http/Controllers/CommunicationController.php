<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Communication;
use App\Communicators;
use App\Http\Controllers\Controller;
use App\Lettertype;
use App\Yearcounter;
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

        $data = Communication::where('parent_id' , '=', null)->get();

        return View('coms.index', compact('data', 't'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outbox()
    {


        $t = 'قائمة انواع الخطابات';

        $data = Communication::all();

        return View('coms.outbox', compact('data', 't'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {


        $t = 'قائمة انواع الخطابات';

        $data = Communication::all();

        return View('coms.inbox', compact('data', 't'));
    }

    public function answer($id, $in)
    {
        return $this->docreate($id, $in);
    }
    public function create()
    {
        return $this->docreate(-1,false);
    }
    public function docreate($id, $in)
    {
        $t = 'انشاء صادر جديد';
        $currentMonth = date('m');
        $currentyear = date('Y');
        $currentDate = date('d');
        $inid = $currentDate .'/' .  $currentMonth . '/' .$currentyear  . '/' . date('s') .''. rand(1,9);
        $counter = Yearcounter::where('year' , '=', (int) $currentyear)->get()->first();

        $inid = $counter->year . '/' . ($counter->count + 1);
        $dests = Communicators::all();
        $ltypes = Lettertype::all();
        if($id> -1){

            $parent = Communication::find($id);
            return View('coms.create', compact('t', 'inid','dests', 'ltypes', 'in', 'parent'));

        }
        return View('coms.create', compact('t', 'inid','dests', 'ltypes', 'in'));
    }

    public function increate()
    {
        return $this->docreate(-1, 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request, -1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $t = 'قائمة انواع الخطابات';

        $d = Communication::find($id);
        $kids = Communication::where('parent_id' , '=', $d->id)->get();

        return View('coms.show', compact('d', 'kids', 't'));



    }


    public function save(Request $request, $id)
    {

        $c = new Communication();
        if($id !== -1)
        {
            $lt = Communication::find($id);
        }

        $c->communicator_id =  $request['communicator_id'];
        $c->lettertype_id =  $request['lettertype_id'];
        $c->subject =  $request['subject'];
        $c->notes =  $request['notes'];
        $c->actionDate =  $request['actionDate'];
        $c->in =  $request['in'];
        $c->user_id = Auth::id() ;
        $c->internal_id =  $request['internal_id'];
        $c->parent_id =  $request['parent_id'];
        $c->attachmentCount =  $request['attachmentCount'];
        $c->hd =$request['hd'];
        $c->hy =$request['hy'];
        $c->hm =$request['hm'];

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
        if($c->lettertype_id== -1)
        {
            $lt = new Lettertype();
            $lt->englishName = $request['englishName'];
            $lt->arabicName = $request['englishName'];
            $lt->push();
            $c->lettertype_id = $lt->id;
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
            $c->attachment1 =  asset('storage/'.$name);

        }

        if($request->file('attachemnt2'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt2');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $c->attachment2 =  asset('storage/'.$name);
        }

        if($request->file('attachemnt3'))
        {
            $now = new DateTime();
            $file = $request->file('attachemnt3');
            $name  =  $file->getClientOriginalName();
            $name = $now->getTimestamp() . '_' . $name;
            $name = str_replace(' ', '',  $name);
            Storage::putFileAs('public', $file, $name);
            $c->attachment3 =  asset('storage/'.$name);
        }

        $c->push();
        $currentyear = date('Y');
        $counter = Yearcounter::where('year' , '=', (int) $currentyear)->get()->first();
        $counter->count = $counter->count + 1;
        $counter->push();

        return redirect('/coms');



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
        Lettertype::destroy($id);
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
