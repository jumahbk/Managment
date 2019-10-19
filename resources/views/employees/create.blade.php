@extends('layouts.app')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet col-md-9">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{    __('messages.createNew')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->


            <form method="POST" action="/types"  class="kt-form kt-form--label-right">
                @csrf


            <div class="kt-portlet__body col-md-9">


                <div class="form-group row form-group-marginless kt-margin-t-20">









                    <label class="col-lg-3 col-form-label">      {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="exampleSelect1">
                        @foreach($titles as $t)
                            <option id="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                            @endforeach
                        </select>                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="exampleSelect1">
                            @foreach($nats as $t)
                                <option id="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <input id="englishName" name="englishName" type="text" class="form-control" placeholder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <input id="arabicName" name="arabicName" type="text" class="form-control" placeholder="الاسم العربي">
                    </div>
                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.idNo')}}:</label>
                    <div class="col-lg-3">
                        <input id="idNo" name="idNo" type="text" class="form-control" placeholder="">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.idExp')}}:</label>
                    <div class="col-lg-3">
                        <input id="idExp" name="idExp" type="date" class="form-control" >
                    </div>




                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.mobile')}}:</label>
                    <div class="col-lg-3">
                        <input id="mobile" name="mobile" type="text" class="form-control">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.email')}}:</label>
                    <div class="col-lg-3">
                        <input id="email" name="email" type="email" class="form-control" >
                    </div>


                </div>


            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-brand">{{    __('messages.save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

@endsection