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
                    {{    __('messages.editwarehouse')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->


        <form method="POST"action="{{ route('warehouses.update',$wa->id)}}" enctype="multipart/form-data" class="kt-form kt-form--label-right">
            @method('PATCH')
            @csrf

            <div class="kt-portlet__body col-md-9">
                <div class="form-group row form-group-marginless kt-margin-t-20">

                    <label class="col-lg-3 col-form-label">      {{    __('messages.branchname')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="branch_id">
                            @foreach($companies as $t)
                                <option

                                        @if($t->id == $wa->branch_id)
                                            selected
                                        @endif

                                        value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                            @endforeach
                        </select>                    </div>

                </div></div>


            <div class="kt-portlet__body col-md-9">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <input id="englishName" name="englishName"  value='{{$wa->englishName}}' type="text" class="form-control" placeholder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <input id="arabicName" value='{{$wa->arabicName}}' name="arabicName" type="text" class="form-control" placeholder="الاسم العربي">
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