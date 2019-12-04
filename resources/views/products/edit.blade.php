@extends('layouts.main')

@section('content')

    <?php

App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet col-md-12">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">

                    {{    __('messages.edittitle')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->



                <form method="post" action="{{ route('products.update',$t->id)}}" enctype="multipart/form-data" class="kt-form kt-form--label-right">
                    @method('PATCH')
                    @csrf
                    <div class="kt-portlet__body col-md-9">
                        <div class="form-group row form-group-marginless kt-margin-t-20">

                            <label class="col-lg-3 col-form-label">      {{    __('messages.vendorname')}}:</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="vendor_id">
                                    @foreach($vendors as $tz)
                                        <option

                                                @if($t->vendor_id == $tz->id)
                                                selected
                                                @endif


                                                value="{{$tz->id}}"> {{$tz->englishName}} -  {{$tz->arabicName}} </option>
                                    @endforeach
                                </select>                    </div>
                            <div class="col-lg-3">
                                <label class="kt-checkbox">
                                    {{$t->disposable}}
                                    <input type="checkbox"  name="disposable" value="1"
                                           @if($t->disposable==1)
                                           checked="checked"
                                            @endif
                                    > Disposable Product
                                    <span></span></label>
                            </div>

                        </div></div>

                    <div class="kt-portlet__body col-md-9">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">                    {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <input id="englishName" name="englishName" type="text" class="form-control" placeholder="Full name" value="{{$t->englishName}}">
                    </div>
                    <label class="col-lg-3 col-form-label"> {{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <input id="arabicName" name="arabicName" type="text" class="form-control" placeholder="الاسم العربي" value="{{$t->arabicName}}">
                    </div>


                </div>


                        <div class="form-group row form-group-marginless kt-margin-t-20">

                            <label class="col-lg-3 col-form-label">      {{    __('messages.unitname')}}:</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="unit_id">
                                    @foreach($u as $tz)
                                        <option

                                               @if($t->unit_id == $tz->id)
                                                selected
                                               @endif
                                                value="{{$tz->id}}"> {{$tz->englishName}} -  {{$tz->arabicName}} </option>
                                    @endforeach
                                </select>                    </div>

                            <label class="col-lg-3 col-form-label">{{    __('messages.min')}}:</label>
                            <div class="col-lg-3">
                                <input id="low" value="{{$t->low}}" name="low" type="number" class="form-control">
                            </div>
                        </div>




            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-brand"> {{    __('messages.save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

@endsection