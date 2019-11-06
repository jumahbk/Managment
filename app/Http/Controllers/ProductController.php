<?php

namespace App\Http\Controllers;

use App\Product;
use App\Unit;
use App\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Product::all();
        $vendors = Vendor::all();
        $u = Unit::all();

        return view('products.index', compact('data', 'vendors', 'u'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  $vendors = Vendor::all();
     //   $u = Unit::all();
    //    return view('products.create' ,  compact( 'vendors', 'u'));
        return $this->batch();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        $vendors = Vendor::all();
        $u = Unit::all();
        return view('products.batch',compact( 'vendors', 'u'));

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
        return redirect('/products');



    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $request = Product::find($id);
        $request->deleted = false;
        $request->push();
        return redirect('/products');



    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $product = Product::find($id);
//        $product->deleted = true;
//        $product->push();
        $product->delete();
        return redirect('/products');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $t)
    {

        return view('products.edit', compact('t','t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->save($request, $product->id);
        return redirect('/products');
    }
    public function saveBatch(Request $request)
    {

        $data = $request['data'];

        $lines = explode("\n", $data);
        for($i = 0; $i < 20 ; $i++)
        {
            if($request['englishName'.$i] == null)
            {
                continue;
            }
            $product = new Product();
            $product->englishName = $request['englishName'.$i];
            $product->arabicName = $request['arabicName'.$i];
            $product->vendor_id = $request['vendor_id'];
            if($request['low'.$i] == null || $request['low'.$i] ='')
            {
                $product->low = 0;

            }else
            {
                $product->low = $request['low'.$i];

            }

            $product->unit_id = $request['unit_id'.$i];

            $product->push();
        }

        redirect('/products');

    }
    public function save(Request $request, $id)
    {
        if($request['batch'] == 1)
        {
            return $this->saveBatch($request);
        }
        $product = new Product();
        if($id !== -1)
        {
            $product = Product::find($id);
        }
        $product->englishName = $request['englishName'];
        $product->arabicName = $request['arabicName'];
        $product->vendor_id = $request['vendor_id'];

        $product->low = $request['low'];

        $product->unit_id = $request['unit_id'];

        $product->push();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete = true;
        $product->push();
        redirect('/products');

        //
    }
}
