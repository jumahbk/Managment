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
                    {{    __('messages.showvendorinfo')}}
                </h3>
            </div>
            <div class="kt-portlet__head-actions pt-3">

                &nbsp;
                <a href="/vendors/{{$d->id}}/edit" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    {{    __('messages.edit')}}
                </a>
            </div>

        </div>

        <!--begin::Form-->


        <form method="POST" action="{{ route('vendors.update',$d->id)}}" enctype="multipart/form-data" class="kt-form kt-form--label-right">
            @method('PATCH')
            @csrf

            <div class="kt-portlet__body col-md-9">

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->englishName}}" id="englishName" name="englishName" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->arabicName}}" id="arabicName" name="arabicName" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.phone')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->phone}}" id="phone" name="phone" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.cr')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->cr}}" id="cr" name="cr" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>


                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.contactName')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->contactName}}" id="contactName" name="contactName" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.mobile')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->mobile}}" id="mobile" name="mobile" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.contactName2')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->contactName2}}" id="contactName2" name="contactName2" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.mobile2')}}:</label>
                    <div class="col-lg-3">
                        <input  value="{{$d->mobile2}}" id="mobile2" name="mobile2" type="text" class="form-control" dlder="الاسم العربي">
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