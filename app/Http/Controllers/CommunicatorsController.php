<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Communicators;
use App\Http\Controllers\Controller;
use App\LetterType;
use Illuminate\Http\Request;

class CommunicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $t = 'قائمة الجهات';

        $data = Communicators::all();

        return View('csources.index', compact('data', 't'));
    }



    public function create()
    {
        $t = 'اضافة نوع خطاب';

        return View('csources.create', compact('t'));
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
        return redirect('/csources');
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

        $lt = new Communicators();
        if($id !== -1)
        {
            $lt = Communicators::find($id);
        }
        $lt->phone = $request['phone'];
        $lt->email = $request['email'];

        $lt->address = $request['address'];
        $lt->fax = $request['fax'];
        $lt->name = $request['name'];
        $lt->contactName = $request['contactName'];
        $lt->mobile = $request['mobile'];

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
