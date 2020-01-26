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
                    {{    __('messages.createNew')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->


            <form method="POST" action="/departments"  class="kt-form kt-form--label-right">
                @csrf

                <div class="kt-portlet__body col-md-9">




                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">

                        <label class="col-lg-4 col-form-label">      {{    __('messages.branchname')}}:</label>
                        <div class="col-lg-7">
                            <select class="form-control" name="branch_id">
                                @foreach($branches as $t)
                                    <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                                @endforeach
                            </select>                    </div>

                 </div></div>



                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">

                        <label class="col-lg-4 col-form-label">     Department Representative:</label>
                        <div class="col-lg-7">
                            <select class="form-control" name="employee_id">
                                @foreach($employees as $t)
                                    <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                                @endforeach
                            </select>                    </div>

                    </div></div>


            <div class="kt-portlet__body col-md-12">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-4">
                        <input id="englishName" name="englishName" type="text" class="form-control" placeholder="Full name">
                    </div>


                </div>


            </div>
                    <div class="kt-portlet__body col-md-12">
                        <div class="form-group row form-group-marginless kt-margin-t-20">

                            <label class="col-lg-3 col-form-label">{{    __('messages.arabicName')}}:</label>
                            <div class="col-lg-4">
                                <input id="arabicName" name="arabicName" type="text" class="form-control" placeholder="الاسم العربي">
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
    </div></div>

@endsection