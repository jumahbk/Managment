<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function create()
    {
        $products = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;;

        return view('requests.create', compact('products'));

    }
}
