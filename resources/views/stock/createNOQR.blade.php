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

        <!--begin::Form-->


            <form method="POST" name="stockForm" action="/stock"  onsubmit="return validateForm()" class="kt-form kt-form--label-right">
                @csrf
                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">

                        <label class="col-lg-3 col-form-label">      {{    __('messages.warehousename')}}:</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="warehouse_id">
                                @foreach($wh as $t)
                                    <option value="{{$t->id}}"> {{$t->englishName}} </option>
                                @endforeach
                            </select>

                        </div>

                        <label class="col-lg-3 col-form-label">      {{    __('messages.productname')}}:</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="product_id">
                                @foreach($p as $t)
                                    <option value="{{$t->id}}"> {{$t->englishName}} ({{$t->unit->englishName}}) </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>


                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">



                        <label class="col-lg-3 col-form-label">{{    __('messages.numberofunits')}}:</label>
                        <div class="col-lg-3">
                            <input id="total" value="1" name="total" type="number" class="form-control">
                        </div>


                        <label class="col-lg-3 col-form-label">{{    __('messages.batchcost')}}:</label>
                        <div class="col-lg-3">
                            <input id="cost" name="cost"  value='0' type="number" class="form-control">
                        </div>
                    </div>


                </div>


            <div class="kt-portlet__body col-md-9">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-md-3 col-form-label">      {{    __('messages.batchname')}}:</label>
                    <div class="col-md-9">
                        <input id="batch" name="batch" type="text" class="form-control" >
                    </div>


                </div>


            </div>

                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">
                        <label class="col-md-3 col-form-label">      {{    __('messages.notes')}}:</label>
                        <div class="col-md-9">
                            <input id="notes" name="notes" type="text" class="form-control" >
                        </div>


                    </div>


                </div>

                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">
                        <label class="col-lg-3 col-form-label">{{    __('messages.receivedDate')}}:</label>
                        <div class="col-lg-3">
                            <input id="receivedDate" value="{{date('Y-m-d')}}" name="receivedDate" type="date" class="form-control">

                        </div>
                        <label class="col-lg-3 col-form-label">{{    __('messages.expDate')}}:</label>
                        <div class="col-lg-3">
                            <input id="expDate" name="expDate" type="date" class="form-control">
                        </div>

                    </div>


                </div>





                <div class="kt-portlet__body col-md-9">
                    <div class="form-group row form-group-marginless kt-margin-t-20">



                        <label class="col-lg-3 col-form-label">{{    __('messages.quantity')}}:</label>
                        <div class="col-lg-3">
                            <input id="q" value="1" name="q" type="number" class="form-control">
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
<script>

    function validateForm() {
        var x = document.forms["stockForm"]["expDate"].value;
        if (x == "") {
            alert("Expiry Must be set");
            return false;
        }
    }

</script>
@endsection