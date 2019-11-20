<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Employee;
use App\Product;
use App\Stock;
use App\StockItem;
use App\Stocklog;
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

    public function log()
    {
        $data = Stocklog::all();

        return view('stock.log', compact('data'));

    }
    public function batchlist()
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

            $data[$i++] = $t;


        }

        $wh = Warehouse::all();
        return view('stock.batchlist', compact('data', 'wh', 'products'));
    }


    public function productlist()
    {
        $data = Stock::all();
        return view('stock.productlist', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function request(Request $request)
    {
//        $warning = null;

        $id = $request['serial'];

//        $stock = Stock::where('serial', $id)->get()->first();
//
//
//        if($stock == null)
//        {
//            $warning = "Invalid Serial Number";
//        }


//        return view('stock.requested' , compact('warning', 'stock'));

        return redirect('/stock/'. $id . '/serial');



    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savemove(Request $request)
    {
        $id = $request['serial'];
        $stockId = $request['id'];
        $howMuch = $request['howmuch'];
        $option = $request['option'];
        $eID = $request['employee_id'];
        $wID = $request['warehouse_id'];
        $stock = Stock::find($stockId);
        if($option == '1')
        {

            $stock->usedUnits = $stock->usedUnits + $howMuch;

            $stockLog = new Stocklog();

            $stockLog->stock_id = $stockId;
            $stockLog->user_id = Auth()->id();
            $stockLog->amountUsed =$howMuch;
            $stockLog->employee_id = $eID;


            $stock->push();
            $stockLog->push();

        }else
        {
            $stock->warehouse_id = $wID;
            $stock->push();
        }
        return redirect('/stock/move');



    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function serial($id)
    {
        $warning = null;
        $emps = Employee::all();

        $stock = Stock::where('serial', $id)->get()->first();

        $warehouses = null;
        if($stock == null)
        {
            $warning = "Invalid Serial Number";
        }else{
            $warehouses = Warehouse::where('id' , '<>', $stock->warehouse_id)->get();

        }



        return view('stock.requested' , compact('warning', 'stock', 'warehouses', 'emps'));



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function move()
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
        return view('stock.move  ', compact('data', 'wh', 'products'));
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




    public function noqr()
    {
        $wh = Warehouse::all();
        $u = Unit::all();
        $p = Product::All();

        return view('stock.createNOQR' ,  compact( 'wh','u','p'));

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

        $q = $request['q'];

        if($q> 0)
        {


            for ($i = 0 ; $i < $q ; $i++)
            {

                $stock = new Stock();
                $stock->user_id = $id = \Auth::user()->id;
                $stock->warehouse_id = $request['warehouse_id'];
                $stock->product_id = $request['product_id'];
                $stock->warehouse_id = $request['warehouse_id'];
                $stock->total = $request['total'];
                $stock->batch = trim($request['batch']);
                $stock->notes = $request['notes'];
                $stock->serial = rand() + rand() + rand();
                $stock->receivedDate = $request['receivedDate'];
                $stock->expDate = $request['expDate'];

                try {
                    $stock->push();
                } catch (\Illuminate\Database\QueryException $e) {
                    continue;
                }




            }



        }else {

            $items = preg_split('/[\s]+/', $data );

            foreach ($items as $d)
            {

                $stock = new Stock();
                $stock->user_id = $id = \Auth::user()->id;
                $stock->warehouse_id = $request['warehouse_id'];
                $stock->product_id = $request['product_id'];
                $stock->warehouse_id = $request['warehouse_id'];
                $stock->total = $request['total'];
                $stock->batch = trim($request['batch']);
                $stock->notes = $request['notes'];
                $stock->serial = trim($d);
                $stock->receivedDate = $request['receivedDate'];
                $stock->expDate = $request['expDate'];

                try {
                    $stock->push();
                } catch (\Illuminate\Database\QueryException $e) {
                    continue;
                }




            }


        }




            redirect('/stock');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return redirect('/stock');

        //
    }
}
