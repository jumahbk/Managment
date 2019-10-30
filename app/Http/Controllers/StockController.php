<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Product;
use App\Stock;
use App\StockItem;
use App\Unit;
use App\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $data= [];
        $i = 0;
        foreach($products as $p )
        {
            $s = $p->stocks;

            $count = 0;

            foreach($s as $ts)
            {

                $count = $ts->left() + $count;
            }




            $t = new StockItem();
            $t->productID = $p->id;
            $t->amountLeft = $count;
            $t->vendorName = $p->vendor->englishName . '-' . $p->vendor->arabicName;
            $t->productName = $p->englishName . '-' . $p->arabicName;

            $data[$i] = $t;


        }

        $wh = Warehouse::all();
        return view('stock.index', compact('data', 'wh', 'products'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($id)
    {
        $s = Stock::where('product_id', $id)->get();

        return view('stock.product', compact('s'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wh = Warehouse::all();
        $u = Unit::all();
        $p = Product::All();

        return view('stock.create' ,  compact( 'wh','u','p'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('stock.batch');

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
        return redirect('/stock');



    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $request = Stock::find($id);
        $request->deleted = false;
        $request->push();
        return redirect('/stock');



    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $stock = Stock::find($id);
        $stock->deleted = true;
        $stock->push();

        return redirect('/stock');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $t)
    {

        return view('stock.edit', compact('t','t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $this->save($request, $stock->id);
        return redirect('/stock');
    }
    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d)
        {

            $tokens = explode(";", $d);
            $stock = new Stock();
            $stock->englishName = $tokens[0];
            $stock->arabicName = $tokens[1];
            $stock->push();

        }

        redirect('/stock');

    }
    public function save(Request $request, $id)
    {



        $data = $request['serial'];

        $items = explode(" ", $data);

        foreach ($items as $d)
        {

            $stock = new Stock();
            $stock->user_id = $id = \Auth::user()->id;
            $stock->warehouse_id = $request['warehouse_id'];
            $stock->product_id = $request['product_id'];
            $stock->unit_id = $request['unit_id'];
            $stock->warehouse_id = $request['warehouse_id'];
            $stock->total = $request['total'];
            $stock->batch = trim($request['batch']);
            $stock->notes = $request['notes'];
            $stock->serial = trim($d);
            $stock->receivedDate = $request['receivedDate'];
            $stock->expDate = $request['expDate'];

            $stock->push();

        }


            redirect('/stock');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete = true;
        $stock->push();
        redirect('/stock');

        //
    }
}
