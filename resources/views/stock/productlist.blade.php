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

                            <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title=""
                                 data-placement="left" data-original-title="Quick actions">
                                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                                  fill="#000000"></path>
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

                        <form class="kt-portlet__head kt-portlet__head--lg kt-form kt-form--label-right" method="POST" action="/stock/filter" >
                            @csrf

                        <div class="kt-portlet__head-label">
                             <h3 class="kt-portlet__head-title pr-2">
                               Product Name :
                                </h3>

                                <h3 class="kt-portlet__head-title">

                                <select class="form-control" name="pid" id="pid">
                                    <option value="-1">All </option>
                                    @foreach($pl as $w)
                                        <option value="{{$w->id}}"

                                        @if($w->id == $pid)
                                            selected
                                            @endif

                                        >{{$w->englishName}} </option>
                                    @endforeach
                                </select>
                            </h3>

                        </div>

                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title pr-2">
                                Location :
                            </h3>

                            <h3 class="kt-portlet__head-title">

                                <select class="form-control" name="wid" id="wid">
                                    <option value="-1">All </option>

                                    @foreach($wh as $w)
                                        <option
                                                @if($w->id == $wid)
                                                selected
                                                @endif

                                                value="{{$w->id}}">{{$w->englishName}} </option>
                                    @endforeach
                                </select>
                            </h3>

                        </div>


                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">

                                <button type="submit" class="btn btn-success">Filter</button>

                            </h3>

                        </div>

                        </form>

                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body">

                        <div class="table-wrapper-scroll-y my-custom-scrollbar">

                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                <tr>

                                    <th>

                                        {{    __('messages.productname')}}

                                    </th>
                                    <th>

                                        {{    __('messages.rby')}}

                                    </th>
                                    <th>

                                        {{    __('messages.warehousename')}}

                                    </th>
                                    <th>

                                        {{    __('messages.batch')}}

                                    </th>

                                    <th>

                                        {{    __('messages.remaining')}}

                                    </th>
                                    <th>

                                        {{    __('messages.serial')}}

                                    </th>
                                    <th>

                                        {{    __('messages.notes')}}

                                    </th>
                                    <th>

                                        {{    __('messages.rdate')}}

                                    </th>
                                    <th>

                                        {{    __('messages.expdate')}}

                                    </th>


                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $d)


                                        @if(($d->total - $d->usedUnits) > 0)
                                        <tr role="row" class="even

                                        @if(strtotime($d->expDate) < strtotime('+6 months'))

                                                bg-warning

@endif



                                        text-info">


                                            <td class="">{{$d->product->englishName}}</td>
                                            <td class="">{{$d->user->name}}</td>
                                            <td class="">{{$d->warehouse->englishName}}</td>
                                            <td class="">{{$d->batch}}</td>
                                            <td class="">{{$d->total - $d->usedUnits}} , {{$d->product->unit->englishName}}</td>
                                            <td class=""><b><a href="/stock/{{$d->id}}/id">{{$d->serial}}</a></b></td>
                                            <td class="">{{$d->notes}}</td>
                                            <td class=""><a href="/stock/{{$d->serial}}">{{$d->receivedDate}}</a></td>
                                            <td class="">{{$d->expDate}}</td>


                                        </tr>
                                        @endif
                                        @endforeach


                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>




    </div>
    <!-- end:: Content -->




@endsection