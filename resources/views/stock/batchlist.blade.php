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

                    <div class="kt-subheader__toolbar">
                        <div class="kt-subheader__wrapper">
                            <a href="#" class="btn kt-subheader__btn-primary">
                                Actions &nbsp;
                                <!--<i class="flaticon2-calendar-1"></i>-->
                            </a>

                            <a href="#" class="btn kt-subheader__btn-primary btn-icon">
                                <i class="flaticon2-file"></i>
                            </a>

                            <a href="#" class="btn kt-subheader__btn-primary btn-icon">
                                <i class="flaticon-download-1"></i>
                            </a>

                            <a href="#" class="btn kt-subheader__btn-primary btn-icon">
                                <i class="flaticon2-fax"></i>
                            </a>

                            <a href="#" class="btn kt-subheader__btn-primary btn-icon">
                                <i class="flaticon2-settings"></i>
                            </a>

                            <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
                                        </g>
                                    </svg>                        <!--<i class="flaticon2-plus"></i>-->
                                </a>

                            </div>
                        </div>
                    </div>
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


                                    <a href="/stock/productlist" class="btn btn-dark btn-elevate btn-icon-sm">
                                        <i class="la la-barcode"></i>
                                        {{    __('messages.productview')}}
                                    </a>&nbsp;
                                    <a href="/stock/create" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{    __('messages.newstock')}}
                                    </a>
                                </div>
                            </div>		</div>
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

                            @foreach($data as $d)
                                @if($d->left ==0)
                                    <?php
                                    continue;
                                    ?>
                                @endif
                                @if($d->low <= $d->amountLeft)
                                    <tr role="row" class="even text-danger">
                                @else
                                    <tr role="row" class="even text-info">

                                @endif
                                    <td class="">{{$d->vendorName}}</td>
                                    <td class=""><a href="/stock/{{$d->productID}}/product">{{$d->productName}} </a> </td>
                                    <td class="">{{$d->amountLeft}}</td>
                                </tr>
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


            $wdata= [];
            $i = 0;
            foreach($products as $p )
            {
                $s = $p->stocks;

                $count = 0;

                foreach($s as $ts)
                {

                    if($ts->warehouse_id == $w->id)
                        {
                            $count = $ts->left() + $count;
                        }

                }


            
                    if($count == 0)
                        {
                            continue;
                        }

                $t = new App\StockItem();
                $t->amountLeft = $count;
                $t->vendorName = $p->vendor->englishName . '-' . $p->vendor->arabicName;
                $t->productName = $p->englishName . '-' . $p->arabicName;

                $wdata[$i] = $t;


            }


            ?>

            <!-- end:: Content Head -->
            <!-- begin:: Content -->
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
    <!-- end:: Content -->




@endsection