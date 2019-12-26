<?php

namespace App\Http\Controllers;
use App\Stockdelete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

use App\Branch;
use App\Employee;
use App\Product;
use App\Stock;
use App\StockItem;
use App\Stocklog;
use App\Title;
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
        $test = DB::table('Stocks')
            ->groupBy('created_at')->get();


        $products = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;
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

    public function returnLog()
    {
        $data = Stock::whereNotNull('returned_at')->get()->sortBy('returned_at');
        return view('stock.returnlog', compact('data'));

    }


    public function batchlistedit(Request $request)
    {
        $pid = -1;
        $wid = -1;
        $data = Stock::all();
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;


        $data = $data->sortBy('englishName');

        return view('stock.batchlistedit', compact('data', 'wh', 'pl', 'pid', 'wid'));
    }

    public function batchlisteditfilter(Request $request)
    {

        $pid = $request['pid'];
        $wid = $request['wid'];
        $data = Stock::all();
        if ($pid > -1 && $wid > -1) {

            $data = Stock::where('product_id', $pid)->where('warehouse_id', $wid)->get();

        } else if ($pid > -1) {

            $data = Stock::where('product_id', $pid)->get();
        } else if ($wid > -1) {

            $data = Stock::where('warehouse_id', $wid)->get();
        }
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;
        $data = $data->sortBy('englishName');

        return view('stock.batchlistedit', compact('data', 'wh', 'pl', 'pid', 'wid'));
    }


    public function batchlist()
    {
        $products = Product::where('disable' , '=', 0)->get();
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
    public function filtergroup(Request $request)
    {

        $pid = $request['pid'];
        $wid = $request['wid'];
        $data = Stock::all();
        if ($pid > -1 && $wid > -1) {

            $data = Stock::where('product_id', $pid)->where('warehouse_id', $wid)->get();

        } else if ($pid > -1) {

            $data = Stock::where('product_id', $pid)->get();
        } else if ($wid > -1) {

            $data = Stock::where('warehouse_id', $wid)->get();
        }
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;
        $data = $data->sortBy('englishName');

        return view('stock.batchmove', compact('data', 'wh', 'pl', 'pid', 'wid'));
    }

    public function filter(Request $request)
    {

        $pid = $request['pid'];
        $wid = $request['wid'];
        $data = Stock::all();
        if($pid > -1 && $wid > -1 )
        {

            $data = Stock::where('product_id', $pid)->where('warehouse_id', $wid)->get();

        }else if($pid > -1)
        {

            $data = Stock::where('product_id', $pid)->get();
        }else if($wid > -1)
        {

            $data = Stock::where('warehouse_id', $wid)->get();
        }
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;
        $data = $data->sortBy('englishName');
        $dp = -1;
        return view('stock.productlist', compact('data', 'wh', 'pl', 'pid', 'wid', 'dp'));
    }
    public function relocategroup(Request $request)
    {

        $wid = $request['wid'];
       $select = $request['selected'];
        if($select)
        {
            $count = count($select);
            for($i = 0 ; $i < $count ; $i++)
            {
                $id = $select[$i];
                $s = Stock::find($id);


                if($request['return']==1)
                {
                    $howMuch = $s->total - $s->usedUnits;
                    $date = new \DateTime('now');
                    $s->returned_at = $date;
                    $s->returned_amount = $howMuch;
                    $s->usedUnits = $s->usedUnits + $howMuch;


                }else
                {
                    $s->warehouse_id = $wid;

                }

                $s->push();
            }
        }

        return $this->productlistwa($wid);
    }

    public function batchdelete(Request $request)
    {


        $select = $request['selected'];
        if($select)
        {
            $count = count($select);
            for($i = 0 ; $i < $count ; $i++)
            {
                $id = $select[$i];
                $s = Stock::find($id);
                $d = new Stockdelete();
                $d->oldId = $s-> id;
                $d->product_id = $s->product_id ;
                $d->user_id = Auth::id() ;
                $d->warehouse_id = $s-> warehouse_id;
                $d-> batch= $s->batch ;
                $d->total = $s->total ;
                $d-> usedUnits= $s->usedUnits ;
                $d-> serial= $s->serial ;
                $d-> notes= $s->notes ;
                $d->receivedDate = $s->receivedDate ;
                $d->expDate = $s->expDate ;
                $d-> cost= $s-> cost;
                $d-> rs= $request['rs'];
                $d-> warehouse_id= $s->warehouse_id ;
                $d->push();

                $s->delete();






            }
        }
        return redirect('/stock');
    }


    public function batchmove()
    {
        $pid = -1;
        $wid = -1;
        $data = Stock::all();
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;


        $data = $data->sortBy('englishName');

        return view('stock.batchmove', compact('data', 'wh', 'pl', 'pid', 'wid'));
    }
    public function productlistwa($wid)
    {
        $pid = -1;

        $data  = Stock::where('warehouse_id', $wid)->get();
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;


        $data = $data->sortBy('englishName');

        return view('stock.productlist', compact('data', 'wh', 'pl', 'pid', 'wid'));
    }
    public function productlist()
    {
        $dp = 0;
        $pid = -1;
        $wid = -1;
        $data = Stock::all();
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;


        $data = $data->sortBy('englishName');

        return view('stock.productlist', compact('data', 'wh', 'pl', 'pid', 'wid','dp'));
    }

    public function deletelog()
    {
        $dp = 0;
        $pid = -1;
        $wid = -1;
        $data = Stockdelete::all();
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;


        $data = $data->sortBy('englishName');

        return view('stock.deletelist', compact('data', 'wh', 'pl', 'pid', 'wid','dp'));
    }



    public function productlistDis()
    {
        $dp = 1;
        $pid = -1;
        $wid = -1;
        $data = Stock::all();
        $wh = Warehouse::all()->sortBy('englishName');;
        $pl = Product::where('disable' , '=', 0)->get()->sortBy('englishName');;


        $data = $data->sortBy('englishName');

        return view('stock.productlist', compact('data', 'wh', 'pl', 'pid', 'wid', 'dp'));
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

        $stock = Stock::where('serial', $id)->get();


        $c = count($stock);
        if($c > 1)
        {
            return $this->multi($stock);
        }else{
            return redirect('/stock/'. $id . '/serial');

        }




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savereturn(Request $request)
    {
        $id = $request['id'];

        $sl = Stocklog::find($id);

        $warehouse_id = $request['warehouse_id'];

        $returnp = $request['returnp'];

        $sl->returned = $returnp;

        $fullamount = $sl->amountUsed;

        $si = $sl->stock;


        $si->usedUnits = $si->usedUnits - $returnp;




        $si->warehouse_id = $warehouse_id;

        $si->push();
        $sl->push();

//        $stockId = $request['id'];
//        $howMuch = $request['howmuch'];
//        $option = $request['option'];
//        $eID = $request['employee_id'];
//        $wID = $request['warehouse_id'];
//        $stock = Stock::find($stockId);
//        if($option == '1')
//        {
//
//            $stock->usedUnits = $stock->usedUnits + $howMuch;
//
//            $stockLog = new Stocklog();
//
//            $stockLog->stock_id = $stockId;
//            $stockLog->user_id = Auth()->id();
//            $stockLog->amountUsed =$howMuch;
//            $stockLog->employee_id = $eID;
//
//
//            $stock->push();
//            $stockLog->push();
//
//        }else
//        {
//            $stock->warehouse_id = $wID;
//            $stock->push();
//        }
        return redirect('/stock/productlist');



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
        if($request['return']==1)
        {
            $date = new \DateTime('now');
           // echo $date->format('D M d, Y G:i');

            $stock->returned_at = $date;
            $stock->returned_amount = $howMuch;
            $stock->usedUnits = $stock->usedUnits + $howMuch;
            $stock->push();

        }
        else if($option == '1')
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
        return redirect('/stock/productlist');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multi($stock)
    {
        $data = $stock;

        return view('stock.productlist', compact('data'));



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
        $employees = Employee::all();
        $emps = [];
        $i = 0;
        $titles = Title::where('isMedical' , '=', true)->get();
        foreach($titles as $t)
        {
            foreach($t->employees as $e)
            {
                $emps[$i++]  = $e;
            }

        }


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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function id($id)
    {
        $warning = null;
        $employees = Employee::all();
        $emps = [];
        $i = 0;
        $titles = Title::where('isMedical' , '=', true)->get();
        foreach($titles as $t)
        {
            foreach($t->employees as $e)
            {
                $emps[$i++]  = $e;
            }

        }


        $stock = Stock::find($id);

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
        $products = Product::where('disable' , '=', 0)->get();
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
        $p = Product::where('disable' , '<>', 1)->get()->sortBy('englishName');

        return view('stock.create' ,  compact( 'wh','u','p'));

    }




    public function noqr()
    {
        $wh = Warehouse::all();
        $u = Unit::all();
        $p = Product::where('disable' , '<>', 1)->get()->sortBy('englishName');

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
    public function return($id)
    {

       $sl = Stocklog::find($id);
       $wh = Warehouse::all();

       return view('stock.return', compact('sl', 'wh'));


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
    public function edit($id)
    {

        $warning = null;
        $employees = Employee::all();
        $emps = [];
        $i = 0;
        $titles = Title::where('isMedical' , '=', true)->get();
        foreach($titles as $t)
        {
            foreach($t->employees as $e)
            {
                $emps[$i++]  = $e;
            }

        }


        $stock = Stock::find($id);

        $warehouses = null;
        if($stock == null)
        {
            $warning = "Invalid Serial Number";
        }else{
            $warehouses = Warehouse::where('id' , '<>', $stock->warehouse_id)->get();

        }
        return view('stock.edit' , compact('warning', 'stock', 'warehouses', 'emps'));


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
//        "id" => "48"
//    "product_id" => "126"
//    "user_id" => "6"
//    "warehouse_id" => "2"
//    "batch" => "1"
//    "total" => "1"
//    "usedUnits" => "0"
//    "serial" => "V17LA80801;2018.11;2020.10;94703JR"
//    "notes" => null
//    "receivedDate" => "2019-11-23"
//    "expDate" => "2020-10-31"
//    "cost" => "0.0"
//    "created_at" => "2019-11-23 16:49:05"
//    "updated_at" => "2019-11-23 16:49:05"


        $stock ->expDate =  $request['expDate'];
        $stock ->total =  $request['total'];
        $stock->usedUnits = 0;

        $stock ->serial =  $request['serial'];
        $stock ->receivedDate =  $request['receivedDate'];

        $stock->push();
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




            redirect('/stock/log');



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
