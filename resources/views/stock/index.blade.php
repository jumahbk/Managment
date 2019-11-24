@extends('layouts.main')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>




    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content Head -->
            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                <div class="kt-container ">


                </div>
            </div>
            <!-- end:: Content Head -->
            <!-- begin:: Content -->
            <div class="kt-container  kt-grid__item kt-grid__item--fluid">
                @if(isset($warning))
                    <div class="alert alert-light alert-elevate" role="alert">


                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                        <div class="alert-text">

                            {{$warning}}
                        </div>

                    </div>
                @endif
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
                            <h3 class="kt-portlet__head-title">
                                {{    __('messages.stocksummery')}}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">

                                    <a href="/stock/batchlist" class="btn btn-google btn-elevate btn-icon-sm">
                                        <i class="la la-folder"></i>
                                        {{    __('messages.locationview')}}
                                    </a>
                                    <a href="/stock/productlist" class="btn btn-dark btn-elevate btn-icon-sm">
                                        <i class="la la-barcode"></i>
                                        {{    __('messages.productview')}}
                                    </a>&nbsp;
                                    <a href="/stock/noqr" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{    __('messages.newstockqr')}}
                                    </a>
                                    <a href="/stock/create" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{    __('messages.newstock')}}
                                    </a>

                                    <a href="stock/log" class="btn btn-twitter btn-elevate btn-icon-sm">
                                        <i class="la la-folder"></i>
                                        {{    __('messages.logview')}}
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body">


                        <table class="table">
                            <thead>
                            <tr>

                                <th>

                                    {{    __('messages.vendorname')}}

                                </th>
                                <th>

                                    {{    __('messages.productname')}}

                                </th>
                                <th>

                                    {{    __('messages.totalleft')}}

                                </th>
                                <th>

                                    {{    __('messages.nearestexp')}}

                                </th>
                                <th>

                                    {{    __('messages.serial')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $d)
                                <?php

                                $low = $d->low;

                                $stocks = $d->stocks;
                                $danger = false;
                                $av = 0;
                                $nearest = null;
                                $serial = null;

                                foreach ($stocks as $s) {
                                    $av = $av + $s->left();
                                    if ($s->left() > 0) {
                                        if ($nearest == null) {

                                            $nearest = $s->expDate;
                                            $serial = $s->id;

                                        } else {
                                            if(strtotime($nearest) > strtotime($s->expDate))
                                                {
                                                    $nearest = $s->expDate;
                                                    $serial = $s->id;
                                                }
                                        }

                                    }


                                }
                                if ($av <= $low) {
                                    $danger = true;
                                }
                                if(strtotime($nearest) < strtotime('+6 months'))
                                {
                                    $danger = true;


                                }

                                ?>

                                @if($av >0)

                                @if($danger)
                                    <tr role="row" class="even bg-warning text-dark">
                                @else
                                    <tr role="row" class="even text-info">

                                        @endif
                                        <td class=""><b>{{$d->vendor->englishName}}</b></td>
                                        <td class=""><b><a

                                                      @if($av > 0)
                                                        href="/stock/{{$serial}}/id"
                                                @endif

                                                >{{$d->englishName}} </a>
                                            </b></td>
                                        <td class=" {{$danger}}"><b>{{$av}}</b></td>
                                        <td class=""><b>{{$nearest}}</b></td>
                                        <td class=""><b>{{$serial}}</b></td>
                                    </tr>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>





                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
                                <h3 class="kt-portlet__head-title">
                                    {{    __('messages.outofstock')}}
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">

                            </div>
                        </div>

                        <div class="kt-portlet__body">


                            <table class="table">
                                <thead>
                                <tr>

                                    <th>

                                        {{    __('messages.vendorname')}}

                                    </th>
                                    <th>

                                        {{    __('messages.productname')}}

                                    </th>
                                    <th>

                                        {{    __('messages.totalleft')}}

                                    </th>
                                    <th>

                                        {{    __('messages.nearestexp')}}

                                    </th>
                                    <th>

                                        {{    __('messages.serial')}}

                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $d)
                                    <?php

                                    $low = $d->low;

                                    $stocks = $d->stocks;
                                    $danger = false;
                                    $av = 0;
                                    $nearest = null;
                                    $serial = null;

                                    foreach ($stocks as $s) {
                                        $av = $av + $s->left();
                                        if ($s->left() > 0) {
                                            if ($nearest == null) {

                                                $nearest = $s->expDate;
                                                $serial = $s->serial;

                                            } else {
                                                if(strtotime($nearest) > strtotime($s->expDate))
                                                {
                                                    $nearest = $s->expDate;
                                                    $serial = $s->serial;
                                                }
                                            }

                                        }


                                    }
                                    if ($av <= $low) {
                                        $danger = false;

                                    }
                                    if(strtotime($nearest) < strtotime('+6 months'))
                                    {
                                        $danger = false;


                                    }
                                    ?>

                                    @if($av< 1)

                                    @if($danger)
                                        <tr role="row" class="even bg-warning text-dark">
                                    @else
                                        <tr role="row" class="even text-info">

                                            @endif
                                            <td class=""><b>{{$d->vendor->englishName}}</b></td>
                                            <td class=""><b><a

                                                            @if($av > 0)
                                                            href="/stock/{{$serial}}/serial"
                                                            @endif

                                                    >{{$d->englishName}} </a>
                                                </b></td>
                                            <td class=" {{$danger}}"><b>{{$av}}</b></td>
                                            <td class=""><b>{{$nearest}}</b></td>
                                            <td class=""><b>{{$serial}}</b></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>

            </div>
        </div>


        @foreach($wh as $w)
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <?php


            $wdata = [];
            $i = 0;
            foreach ($products as $p) {
                $s = $p->stocks;

                $count = 0;

                foreach ($s as $ts) {

                    if ($ts->warehouse_id == $w->id) {
                        $count = $ts->left() + $count;
                    }

                }


                $t = new App\StockItem();
                $t->amountLeft = $count;
                $t->vendorName = $p->vendor->englishName . '-' . $p->vendor->arabicName;
                $t->productName = $p->englishName . '-' . $p->arabicName;

                $wdata[$i] = $t;


            }


            ?>

            <!--

                <div class="kt-container  kt-grid__item kt-grid__item--fluid">

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-location"></i>
			</span>
                                <h3 class="kt-portlet__head-title">
                                    {{  $w->englishName  }} - {{ $w->arabicName }}
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                            </div>
                        </div>

                        <div class="kt-portlet__body">


                            <table class="table">
                                <thead>
                                <tr>

                                    <th>

                                        {{    __('messages.vendorname')}}

                                    </th>
                                    <th>

                                        {{    __('messages.productname')}}

                                    </th>
                                    <th>

                                        {{    __('messages.totalleft')}}

                                    </th>


                                </tr>
                                </thead>
                                <tbody>

                                @foreach($wdata as $d)
                                    <tr role="row" class="even">
                                        <td class="">{{$d->vendorName}}</td>
                                        <td class="">{{$d->productName}} </td>
                                        <td class="">{{$d->amountLeft}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>



        @endforeach


    </div>
 -->




@endsection