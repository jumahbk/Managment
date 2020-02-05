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

                            <h3 class="kt-portlet__head-title">
                               Important Items
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
                                    <a href="stock/batchlistedit" class="btn btn-google btn-elevate btn-icon-sm">
                                        <i class="la la-trash"></i>
                                        DELETE
                                    </a>
                                    <a href="/stock" class="btn btn-twitter btn-elevate btn-icon-sm">
                                        <i class="la la-folder"></i>
                                        Full View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body">


                        <table class="table" id ='kt_table_2'>
                            <thead>
                            <tr>


                                <th>

                                    {{    __('messages.productname')}}

                                </th>

                                <th>

                                    Item Count

                                </th>


                                <th>

                                    Unit Count

                                </th>
                                <th>

                                    {{    __('messages.nearestexp')}}

                                </th>

                                <th>

                                    {{    __('messages.vendorname')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $d)
                                <?php

                                $low = $d->low;
                                if($d->fav == 0 )
                                {
                                    continue;
                                }
                                $first = 1;
                                $stocks = $d->stocks;
                                $danger = false;
                                $dateDanger = false;
                                $av = 0;
                                $nearest = null;
                                $id = null;
                                $serial = null;
                                $unit = '';
                                $unitCount = 0;

                                foreach ($stocks as $s) {


                                    $av = $av + $s->left();
                                    if($s->left()>0)
                                        {
                                            $unitCount++;

                                        }
                                        if ($first == 1 ) {
                                            $first = null;
                                            if($s->left()>0){
                                                $nearest = $s->expDate;

                                            }else{
                                                $nearest = '10-10-2030';
                                            }
                                            $id = $s->id;
                                            $serial = $s->serial;
                                            $unit =  $s->product->unit->englishName;
                                        } else {
                                            if(strtotime($nearest) > strtotime($s->expDate) && $s->left() > 0)
                                                {
                                                    $nearest = $s->expDate;
                                                    $id = $s->id;
                                                    $serial = $s->serial;
                                                }
                                        }




                                }
                                if ($av <= $low) {
                                    $danger = true;
                                }
                                if(strtotime($nearest) < strtotime('+6 months'))
                                {
                                    $dateDanger = true;


                                }


                                ?>




                                    <tr role="row" class="even

                                    @if($unitCount == 0)
                                    btn-google

                                    @elseif($danger)
                                            btn-warning

                                    @elseif($dateDanger)
                                            btn-twitter
                                    @endif

                                    ">


                                        <td ><b><a

                                                      @if($av > 0)
                                                        href="/stock/{{$id}}/id"
                                                @endif

                                                >{{$d->englishName}} </a>
                                            </b></td>
                                        <td ><b>{{$unitCount}}</b></td>

                                        <td ><b>{{$av}}</b> : {{$unit}}</td>
                                        <td ><b>

                                                @if($unitCount > 0)
                                                {{$nearest}}
                                                @endif

                                            </b></td>
                                        <td ><b>{{$d->vendor->englishName}}</b></td>

                                    </tr>

                                    @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>







            </div>















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
                                Medical Stock Summery
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
                                    <a href="stock/batchlistedit" class="btn btn-google btn-elevate btn-icon-sm">
                                        <i class="la la-trash"></i>
                                        DELETE
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body">


                        <table class="table" id ='kt_table_3'>
                            <thead>
                            <tr>


                                <th>

                                    {{    __('messages.productname')}}

                                </th>

                                <th>

                                    Item Count

                                </th>


                                <th>

                                    Unit Count

                                </th>
                                <th>

                                    {{    __('messages.nearestexp')}}

                                </th>

                                <th>

                                    {{    __('messages.vendorname')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $d)
                                <?php
                                $low = $d->low;
                                if($d->fav == 1 || $d->disposable ==1 )
                                {
                                    continue;
                                }
                                $first = 1;
                                $stocks = $d->stocks;
                                $danger = false;
                                $dateDanger = false;
                                $av = 0;
                                $nearest = null;
                                $id = null;
                                $serial = null;
                                $unit = '';
                                $unitCount = 0;

                                foreach ($stocks as $s) {


                                    $av = $av + $s->left();
                                    if($s->left()>0)
                                    {
                                        $unitCount++;

                                    }
                                    if ($first == 1 ) {
                                        $first = null;
                                        if($s->left()>0){
                                            $nearest = $s->expDate;

                                        }else{
                                            $nearest = '10-10-2030';
                                        }
                                        $id = $s->id;
                                        $serial = $s->serial;
                                        $unit =  $s->product->unit->englishName;
                                    } else {
                                        if(strtotime($nearest) > strtotime($s->expDate) && $s->left() > 0)
                                        {
                                            $nearest = $s->expDate;
                                            $id = $s->id;
                                            $serial = $s->serial;
                                        }
                                    }




                                }
                                if ($av <= $low) {
                                    $danger = true;
                                }
                                if(strtotime($nearest) < strtotime('+6 months'))
                                {
                                    $dateDanger = true;


                                }


                                ?>




                                <tr role="row" class="even

                                    @if($unitCount == 0)
                                        btn-google

@elseif($danger)
                                        btn-warning

@elseif($dateDanger)
                                        btn-twitter
@endif

                                        ">


                                    <td ><b><a

                                                    @if($av > 0)
                                                    href="/stock/{{$id}}/id"
                                                    @endif

                                            >{{$d->englishName}} </a>
                                        </b></td>
                                    <td ><b>{{$unitCount}}</b></td>

                                    <td ><b>{{$av}}</b> : {{$unit}}</td>
                                    <td ><b>

                                            @if($unitCount > 0)
                                                {{$nearest}}
                                            @endif

                                        </b></td>
                                    <td ><b>{{$d->vendor->englishName}}</b></td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
















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
                                Disposables Stock Summery
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


                        <table class="table" id ='kt_table_4'>
                            <thead>
                            <tr>


                                <th>

                                    {{    __('messages.productname')}}

                                </th>

                                <th>

                                    Item Count

                                </th>


                                <th>

                                    Unit Count

                                </th>
                                <th>

                                    {{    __('messages.nearestexp')}}

                                </th>

                                <th>

                                    {{    __('messages.vendorname')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $d)
                                <?php
                                $low = $d->low;
                                if($d->fav == 1 || $d->disposable == 0 )
                                {
                                    continue;
                                }
                                $first = 1;
                                $stocks = $d->stocks;
                                $danger = false;
                                $dateDanger = false;
                                $av = 0;
                                $nearest = null;
                                $id = null;
                                $serial = null;
                                $unit = '';
                                $unitCount = 0;

                                foreach ($stocks as $s) {


                                    $av = $av + $s->left();
                                    if($s->left()>0)
                                    {
                                        $unitCount++;

                                    }
                                    if ($first == 1 ) {
                                        $first = null;
                                        if($s->left()>0){
                                            $nearest = $s->expDate;

                                        }else{
                                            $nearest = '10-10-2030';
                                        }
                                        $id = $s->id;
                                        $serial = $s->serial;
                                        $unit =  $s->product->unit->englishName;
                                    } else {
                                        if(strtotime($nearest) > strtotime($s->expDate) && $s->left() > 0)
                                        {
                                            $nearest = $s->expDate;
                                            $id = $s->id;
                                            $serial = $s->serial;
                                        }
                                    }




                                }
                                if ($av <= $low) {
                                    $danger = true;
                                }
                                if(strtotime($nearest) < strtotime('+6 months'))
                                {
                                    $dateDanger = true;


                                }


                                ?>




                                <tr role="row" class="even

                                    @if($unitCount == 0)
                                        btn-google

@elseif($danger)
                                        btn-warning

@elseif($dateDanger)
                                        btn-twitter
@endif

                                        ">


                                    <td ><b><a

                                                    @if($av > 0)
                                                    href="/stock/{{$id}}/id"
                                                    @endif

                                            >{{$d->englishName}} </a>
                                        </b></td>
                                    <td ><b>{{$unitCount}}</b></td>

                                    <td ><b>{{$av}}</b> : {{$unit}}</td>
                                    <td ><b>

                                            @if($unitCount > 0)
                                                {{$nearest}}
                                            @endif

                                        </b></td>
                                    <td ><b>{{$d->vendor->englishName}}</b></td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>







            </div>
        </div>







                    <script>
                        $(document).ready(function() {
                            $('#kt_table_1').DataTable( {
                                "paging":   false


                            } );
                        });
                        $(document).ready(function() {
                            $('#kt_table_2').DataTable( {
                                "paging":   false


                            } );
                        });
                        $(document).ready(function() {
                            $('#kt_table_3').DataTable( {
                                "paging":   false


                            } );
                        });
                        $(document).ready(function() {
                                $('#kt_table_4').DataTable( {
                                    "paging":   false


                                } );
                        }


                        );
                    </script>









@endsection