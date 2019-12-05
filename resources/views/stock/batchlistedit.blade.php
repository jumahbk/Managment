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

                        <form class="kt-portlet__head kt-portlet__head--lg kt-form kt-form--label-right" method="POST" action="/stock/filtergroup" >
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
                    <form class="kt-portlet__head kt-portlet__head--lg kt-form kt-form--label-right" method="POST" action="/stock/deletegroup" >

                    <div class="kt-portlet__body">


                        <div class="form-group row form-group-marginless kt-margin-t-0 mb-1">



                            <div class="col-lg-1 m-0 p-0">
                                <input id="total" class="btn btn-success" value="Select All" onclick="selectall(this)" name="total" type="button" class="form-control">
                            </div>


                            <label class="col-lg-2 col-form-label m-0 ">Reason for delete</label>
                            <div class="col-lg-3 m-0">
                                <input id="cost" name="cost"  value='0' type="text" class="form-control">
                            </div>

                            <div class="col-lg-1 m-0">
                                <input id="total"  class="btn btn-success" value="Delete" name="total" type="submit" class="form-control">
                            </div>


                        </div>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">

                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>
                                        Select
                                    </th>
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

                                    @csrf
                                    @foreach($data as $d)


                                        @if(($d->total - $d->usedUnits) > 0)
                                            <tr role="row" class="even

                                        @if(strtotime($d->expDate) < strtotime('+6 months'))

                                                    bg-warning

@endif



                                                    text-info">

                                                <td>
                                                    <input type="checkbox"  name="selected" value="{{$d->id}}">


                                                </td>
                                                <td class="">{{$d->product->englishName}}</td>
                                                <td class="">{{$d->user->name}}</td>
                                                <td class="">{{$d->warehouse->englishName}}</td>
                                                <td class="">{{$d->batch}}</td>
                                                <td class="">{{$d->total - $d->usedUnits}} : {{$d->product->unit->englishName}}</td>
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
                    <script>

                        function selectall(source) {
                            checkboxes = document.getElementsByName('selected');
                            for(var i=0, n=checkboxes.length;i<n;i++) {
                                checkboxes[i].checked = source.checked;
                                alert(i);
                            }
                        }

                    </script>

                    </div>
                    </form>
                </div>

            </div>
        </div>




    </div>
    <!-- end:: Content -->




@endsection