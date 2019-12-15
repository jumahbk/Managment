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
                               Today's Returns
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">

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

                                     Amount

                                </th>
                                <th>

                                    Return Date


                                </th>

                                <th>

                                    {{    __('messages.serial')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $d)

                                @if(date('Ymd') == date('Ymd', strtotime($d->returned_at)))

                                    <tr role="row" class="even text-info">
                                        <td class=""><b>{{$d->product->englishName}}</b></td>
                                        <td class=""><b>{{$d->returned_amount}}</b></td>
                                        <td class=""><b>{{$d->returned_at}}</b></td>

                                        <td class=""><b>{{$d->serial}}</b></td>



                                    </tr>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

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

                            <h3 class="kt-portlet__head-title">
                                Past Returns
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">

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

                                     Amount

                                </th>
                                <th>

                                    Return Date

                                </th>

                                <th>

                                    {{    __('messages.serial')}}

                                </th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $d)

                                @if(date('Ymd') != date('Ymd', strtotime($d->returned_at)))

                                    <tr role="row" class="even text-info">
                                        <td class=""><b>{{$d->product->englishName}}</b></td>
                                        <td class=""><b>{{$d->returned_amount}}</b></td>
                                        <td class=""><b>{{$d->returned_at}}</b></td>

                                        <td class=""><b>{{$d->serial}}</b></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>




@endsection