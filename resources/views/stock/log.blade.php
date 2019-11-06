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
                                    <a href="/stock/create" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{    __('messages.newstock')}}
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

                                    {{    __('messages.productname')}}

                                </th>
                                <th>

                                    {{    __('messages.amountused')}}

                                </th>
                                <th>

                                    {{    __('messages.date')}}

                                </th>
                                <th>

                                    {{    __('messages.usercheckout')}}

                                </th>
                                <th>

                                    {{    __('messages.usedby')}}

                                </th>
                                <th>

                                    {{    __('messages.serial')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $d)


                                    <tr role="row" class="even text-info">
                                        <td class=""><b>{{$d->stock->product->englishName}}</b></td>
                                        <td class=""><b>{{$d->amountUsed}}</b></td>
                                        <td class=""><b>{{$d->amountUsed}}</b></td>
                                        <td class=""><b>{{$d->user->name}}</b></td>
                                        <td class=""><b>{{$d->employee->englishName}}</b></td>
                                        <td class=""><b>{{$d->stock->serial}}</b></td>


                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>






@endsection