<?php

namespace App\Http\Controllers;

use App\Devicecontract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return View('lettertypes.index');
    }

}
