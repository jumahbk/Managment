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
                    {{    __('messages.createNew')}}
                </h3>
            </div>
        </div>

        <!--begin::Form-->


        <form method="POST" action="/products"  class="kt-form kt-form--label-right">
            @csrf
            <input id='batch' name="batch" value="1" type="hidden" />
            <div class="kt-portlet__body col-md-12">
                <div class="form-group row form-group-marginless kt-margin-t-20">

                    <label class="col-lg-3 col-form-label">      {{    __('messages.vendorname')}}:</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="vendor_id">
                            @foreach($vendors as $t)
                                <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                            @endforeach
                        </select>                    </div>

                </div>
            </div>
            <div class="kt-portlet__body">



                <table class="table">
                    <thead>
                    <tr>
                        <th>

                            {{    __('messages.englishName')}}

                        </th>
                        <th>

                            {{    __('messages.arabicName')}}

                        </th>
                        <th>

                            {{    __('messages.unitname')}}


                        </th>
                        <th>

                            {{    __('messages.low')}}

                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @for($i = 0 ; $i <20 ; $i++)
                        <tr role="row" class="even">
                            <td class="">
                                <input id="englishName{{$i}}" name="englishName{{$i}}" type="text" class="form-control" >

                            </td>
                            <td>
                                <input id="arabicName{{$i}}" name="arabicName{{$i}}" type="text" class="form-control" >


                            </td>
                            <td class="">

                                <select class="form-control" name="unit_id{{$i}}">
                                    @foreach($u as $t)
                                        <option value="{{$t->id}}"> {{$t->englishName}} -  {{$t->arabicName}} </option>
                                    @endforeach
                                </select>

                            </td>
                            <td class="">

                                <input id="low{{$i}}" value='0' name="low{{$i}}" type="number" class="form-control">

                            </td>




                        </tr>
                    @endfor
                    </tbody>
                </table>

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