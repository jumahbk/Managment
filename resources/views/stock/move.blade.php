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
                    {{    __('messages.serialtomove')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->


        <form method="POST" action="/stock/move"  class="kt-form kt-form--label-right">
            @csrf






            <div class="kt-portlet__body col-md-12">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <h2> {{    __('messages.serialnumbertomove')}}</h2>
                    <div class="col-lg-12">
                        <input type="hidden" id="batch" name="batch" value="1" />
                        <input id="serial" name="serial" type="text" class="form-control" rows="1" cols="500" ></input>
                    </div>
                </div>
            </div>


            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-brand">{{    __('messages.request')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

@endsection