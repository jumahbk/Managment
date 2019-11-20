@extends('layouts.main')

@section('content')

    <?php

App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet col-md-9">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">

                    {{    __('messages.edittitle')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->



                <form method="post" action="{{ route('title.update',$t->id)}}" enctype="multipart/form-data" class="kt-form kt-form--label-right">
                    @method('PATCH')
                    @csrf


                    <div class="kt-portlet__body col-md-9">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">                    {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <input id="englishName" name="englishName" type="text" class="form-control" placeholder="Full name" value="{{$t->englishName}}">
                    </div>
                    <label class="col-lg-3 col-form-label"> {{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <input id="arabicName" name="arabicName" type="text" class="form-control" placeholder="الاسم العربي" value="{{$t->arabicName}}">


                        <label class="kt-checkbox">
                            <input type="checkbox"


                                   @if($t->isMedical)
                                   checked="checked"
                                    @endif


                                   name="isMedical" id="isMedical"> Is Medical
                            <span></span>
                        </label>








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