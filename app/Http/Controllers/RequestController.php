<?php

namespace App\Http\Controllers;

use App\Product;
use App\Role;
use App\Stockrole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class RequestController extends Controller
{
    public function create()
    {
        $products = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;;
        $sr = Stockrole::all();


        return view('requests.create', compact('products', 'sr'));

    }
    public function index()
    {


        return view('requests.index');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creator = Auth()->user()->id;
        $pharmacist = $request['pharmacist'];
        $accountant = $request['accountant'];
        $doctor = $request['doctor'];
        $product_id = $request['product_id'];

        $r = new \App\Request();
        $r->waitingon = $doctor;
        $r->creator  = $creator;
        $r->first = $doctor;
        $r->third = $accountant;
        $r->second = $pharmacist ;



        $r->createDate =   date("Y/m/d");
        $r-> comments = $request['comments'];;
        $r->amount = $request['amount'];;
        $r->product_id = $product_id ;
        $r->issueID= 0;
        $r->push();
        $r->issueID= $r->id;

        $r->push();
        

    }

}
