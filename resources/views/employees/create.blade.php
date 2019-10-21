@extends('layouts.app')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet col-md-12">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{    __('messages.createNewEmployee')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->


            <form method="POST" action="/employees"  class="kt-form kt-form--label-right">
                @csrf


            <div class="kt-portlet__body col-md-9">


                <div class="form-group row form-group-marginless kt-margin-t-20">

                    <label class="col-lg-3 col-form-label">      {{    __('messages.companyname')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="company_id">
                            @foreach($comps as $t)
                                <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                            @endforeach
                        </select>                    </div>

                </div>



                <div class="form-group row form-group-marginless kt-margin-t-20">








                    <label class="col-lg-3 col-form-label">      {{    __('messages.title')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="title_id">
                        @foreach($titles as $t)
                            <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                            @endforeach
                        </select>                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.nat')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="nationality_id">
                            @foreach($nats as $t)
                                <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
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
                    <label class="col-lg-3 col-form-label">      {{    __('messages.mohNo')}}:</label>
                    <div class="col-lg-3">
                        <input id="idNo" name="mohNo" type="text" class="form-control" placeholder="">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.mohExp')}}:</label>
                    <div class="col-lg-3">
                        <input id="mohExp" name="mohExp" type="date" class="form-control" >
                    </div>




                </div>


                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.licNo')}}:</label>
                    <div class="col-lg-3">
                        <input id="licNo" name="licNo" type="text" class="form-control" placeholder="">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.licExp')}}:</label>
                    <div class="col-lg-3">
                        <input id="idExp" name="licExp" type="date" class="form-control" >
                    </div>




                </div>


                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.gosi')}}:</label>
                    <div class="col-lg-3">
                        <input id="gosi" name="gosi" type="text" class="form-control" placeholder="">
                    </div>

                    <label class="col-lg-3 col-form-label">{{    __('messages.birthdate')}}:</label>
                    <div class="col-lg-3">
                        <input id="brithdate" name="brithdate" type="date" class="form-control" >
                    </div>


                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.passNo')}}:</label>
                    <div class="col-lg-3">
                        <input id="passNo" name="passNo" type="text" class="form-control" placeholder="">
                    </div>

                    <label class="col-lg-3 col-form-label">{{    __('messages.passExp')}}:</label>
                    <div class="col-lg-3">
                        <input id="passExp" name="passExp" type="date" class="form-control" >
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

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.bankno')}}:</label>
                    <div class="col-lg-3">
                        <input id="iban" name="iban" type="text" class="form-control">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.bankcode')}}:</label>
                    <div class="col-lg-3">
                        <input id="bankcode" name="bankcode" type="text" class="form-control" >
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