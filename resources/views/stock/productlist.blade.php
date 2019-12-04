@extends('layouts.main')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();
    $filter = -1;
    if(isset($dp))
    {
        $filter = $dp;
    }
    ?>




    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content Head -->
            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                <div class="kt-container ">

                    <div class="kt-subheader__toolbar">
                        <div class="kt-subheader__wrapper">

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
                                        @if($w->deleted == 1)
                                            @continue;
                                        @elseif($filter == -1)

                                        @elseif($filter == 1 && $w->disposable != 1)
                                            @continue;
                                        @elseif($filter != 1 && $w->disposable ==1)
                                            @continue;
                                        @endif

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

                                        {{    __('messages.warehousename')}}

                                    </th>


                                    <th>

                                        {{    __('messages.remaining')}}

                                    </th>
                                    <th>

                                        {{    __('messages.serial')}}

                                    </th>


                                    <th>

                                        {{    __('messages.expdate')}}

                                    </th>
                                    <th>

                                        {{    __('messages.batch')}}

                                    </th>

                                    <th>

                                        {{    __('messages.notes')}}

                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $d)



                                    @if($filter == -1)

                                    @elseif($filter == 1 && $d->product->disposable != 1)
                                        @continue;
                                    @elseif($filter != 1 && $d->product->disposable ==1)
                                        @continue;
                                    @endif


                                        @if(($d->total - $d->usedUnits) > 0)
                                        <tr role="row" class="even

                                        @if(strtotime($d->expDate) < strtotime('+6 months'))

                                                bg-warning

@endif



                                        text-info">


                                            <td class=""><b><a href="/stock/{{$d->id}}/id">{{$d->product->englishName}}</a></b></td>
                                            <td class=""><a href="/stock/{{$d->id}}/id">{{$d->warehouse->englishName}}</a></td>
                                            <td class=""><a href="/stock/{{$d->id}}/id">{{$d->total - $d->usedUnits}} : {{$d->product->unit->englishName}}</a></td>
                                            <td class=""><a href="/stock/{{$d->id}}/id">{{$d->serial}}</a></td>
                                            <td class=""><a href="/stock/{{$d->id}}/id">{{$d->expDate}}</a></td>


                                            <td class=""><a href="/stock/{{$d->id}}/id">{{$d->batch}}</a></td>

                                            <td class=""><a href="/stock/{{$d->id}}/id">{{$d->notes}}</a></td>



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