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
                    {{    __('messages.productview')}}
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
            <div class="row">
                <div class="col-md-6">
                    <div class="kt-portlet">




                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Textual HTML5 Inputs
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-3 col-form-label"> {{__('messages.productname')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" disabled id="example-text-input" value="{{$stock->product->englishName}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-3 col-form-label"> {{__('messages.location')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" disabled value="{{$stock->warehouse->englishName}}" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-3 col-form-label">{{__('messages.expdate')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" disabled value="{{$stock->expDate}}">
                                    </div>
                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">
                                            <button type="reset" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="col-md-6">
            <div class="kt-portlet">




                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Textual HTML5 Inputs
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label">{{__('messages.vendorname')}}</label>
                            <div class="col-9">
                                <input class="form-control" type="text" disabled id="example-text-input" value="{{$stock->product->vendor->englishName}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Search</label>
                            <div class="col-10">
                                <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Email</label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">URL</label>
                            <div class="col-10">
                                <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                            <div class="col-10">
                                <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-2 col-form-label">Password</label>
                            <div class="col-10">
                                <input class="form-control" type="password" value="hunter2" id="example-password-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-2 col-form-label">Number</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="42" id="example-number-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                            <div class="col-10">
                                <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-month-input" class="col-2 col-form-label">Month</label>
                            <div class="col-10">
                                <input class="form-control" type="month" value="2011-08" id="example-month-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-week-input" class="col-2 col-form-label">Week</label>
                            <div class="col-10">
                                <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-time-input" class="col-2 col-form-label">Time</label>
                            <div class="col-10">
                                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-color-input" class="col-2 col-form-label">Color</label>
                            <div class="col-10">
                                <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Range</label>
                            <div class="col-10">
                                <input class="form-control" type="range">
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <button type="reset" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>

    @endif

@endsection