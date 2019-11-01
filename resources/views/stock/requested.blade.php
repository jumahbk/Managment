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
                    {{    __('messages.newstock')}}
                </h3>
            </div>
        </div>

        @if(isset($warning))
            <div class="alert alert-light alert-elevate" role="alert">


                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                <div class="alert-text">

                    {{$warning}}


                    <a href="/stock/move" ><b>Back</b> </a>
                </div>

            </div>


        @else


        <form method="POST" action="/stock/move"  class="kt-form kt-form--label-right">
            @csrf






            <div class="kt-portlet__body col-md-12">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <h2> {{    __('messages.serialnumbertomove')}}</h2>
                    <div class="col-lg-12">
                        <input type="hidden" id="batch" name="batch" value="1" />
                        <textarea id="serial" name="serial" type="text" class="form-control" rows="1" cols="500" ></textarea>
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

    @endif
        <!--end::Form-->
    </div>

@endsection