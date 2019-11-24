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
                    {{    __('messages.edit')}}
                </h3>
            </div>
        </div>

        @if(isset($warning))
            <div class="alert alert-light alert-elevate" role="alert">


                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                <div class="alert-text">

                    {{$warning}}


                    <a href="/stock/" ><b>Back</b> </a>
                </div>

            </div>


        @else
        <!--begin::Form-->

            <form class="kt-form kt-form--label-right" method="POST" action="{{ route('stock.update',$stock->id)}}" >
                @method('PATCH')
                @csrf

                <div class="row">
                <div class="col-md-6">
                    <div class="kt-portlet">




                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{__('messages.edit')}}
                                </h3>
                            </div>
                        </div>


                            <input type="hidden" name="id" value="{{$stock->id}}" />
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-4 col-form-label"> {{__('messages.unitsav')}} </label>
                                    <div class="col-8">
                                        <input class="form-control"   name='total' type="text"   value="{{$stock->left()}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="example-search-input" class="col-4 col-form-label"> {{__('messages.location')}}</label>
                                    <div class="col-8">
                                        <input class="form-control" disabled value="{{$stock->warehouse->englishName}}" id="example-search-input">
                                    </div>
                                </div>



                                <div class="form-group row">


                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-9">
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-success">Submit</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="kt-portlet">




                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title pr-4">
                                    {{__('messages.productinfo')}}
                                </h3>

                                <div class="kt-portlet__head-actions">

                                    <a href="/stock/{{$stock->id}}/edit"  class="btn btn-twitter btn-elevate btn-icon-sm">
                                        <i class="la la-edit"></i>
                                        {{    __('messages.edit')}}
                                    </a>
                                    <a href="/stock/{{$stock->id}}/destroy" onclick="return confirm('Are you sure you want to delete? this action cannot be reversed')" class="btn btn-google btn-elevate btn-icon-sm">
                                        <i class="la la-recycle"></i>
                                        {{    __('messages.delete')}}
                                    </a>


                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-3 col-form-label"> {{__('messages.serial')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text"  name='serial' id='serial' id="example-text-input" value="{{$stock->serial}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-3 col-form-label"> {{__('messages.productname')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" disabled id="example-text-input" value="{{$stock->product->englishName}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-3 col-form-label">{{__('messages.vendorname')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" disabled value="{{$stock->product->vendor->englishName}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-3 col-form-label"> {{__('messages.location')}}</label>
                                    <div class="col-9">
                                        <input class="form-control"  value="{{$stock->warehouse->englishName}}" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-3 col-form-label">{{__('messages.expdate')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" name="expDate" type="date"  value="{{$stock->expDate}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-3 col-form-label">{{__('messages.receivedDate')}}</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" name="receivedDate" id="receivedDate"  value="{{$stock->receivedDate}}">
                                    </div>
                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">

                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>

            </div>
            </form>
    @endif

@endsection