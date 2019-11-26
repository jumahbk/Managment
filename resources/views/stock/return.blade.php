
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
                    Return to stock
                </h3>
            </div>
        </div>





    <div class="row">
        <div class="col-md-12">
            <div class="kt-portlet">





                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" method="POST" action="/stock/savereturn" >
                    @csrf

                    <input type="hidden" name="id" value="{{$sl->id}}" />
                    <div class="kt-portlet__body">
                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label"> Product Name</label>
                            <div class="col-3">
                                <input class="form-control"  disabled type="text"   value=" {{ $sl->stock->product->englishName }}">
                            </div>
                        </div>

                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label"> Exp. Date:</label>
                            <div class="col-3">
                                <input class="form-control"   disabled type="date"   value="{{ $sl->stock->expDate }}">
                            </div>
                        </div>

                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label">Serial No.</label>
                            <div class="col-3">
                                <input class="form-control"   disabled type="text"   value="{{ $sl->stock->serial }}">
                            </div>
                        </div>

                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label">Reserved for</label>
                            <div class="col-3">
                                <input class="form-control"   disabled type="text"   value="{{ $sl->employee->englishName }}">
                            </div>
                        </div>


                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label"> Amount reserved</label>
                            <div class="col-3">
                                <input class="form-control"  id="fullamount" name="fullamount" disabled type="text"   value="{{$sl->amountUsed}}">
                            </div>
                        </div>


                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label"> 	Amount to return ({{$sl->stock->product->unit->englishName}}):</label>
                            <div class="col-3">
                                <input class="form-control" type="number" name="returnp" value="0" id="returnp" min="0" max="{{$sl->amountUsed}}" />
                            </div>
                        </div>


                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label"> 		Return to:</label>
                            <div class="col-3">
                                <select class="form-control" name="warehouse_id" id="warehouse_id">

                                    @foreach($wh as $a)
                                        <option value="{{$a->id}}">{{$a->englishName}} </option>
                                    @endforeach
                                </select>                            </div>
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
                </form>
            </div>
        </div></div>

    </div>

@endsection