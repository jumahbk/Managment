
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




                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ $sl->stock->product->englishName }} - Exp. {{ $sl->stock->expDate }} - Serial {{ $sl->stock->serial }}
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" method="POST" action="/stock/savereturn" >
                    @csrf

                    <input type="hidden" name="id" value="{{$sl->id}}" />
                    <div class="kt-portlet__body">
                        <div class="form-group row mr-0">
                            <label for="example-text-input" class="col-4 col-form-label"> Amount reserved for <b>{{$sl->employee->englishName}} </b></label>
                            <div class="col-3">
                                <input class="form-control"  id="fullamount" name="fullamount" disabled type="text"   value="{{$sl->amountUsed}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="kt-option">

                                    <span class="kt-option__label">
																			<span class="kt-option__head">
																				<span class="kt-option__title">
																					Percentage to return:
																				</span>

																			</span>
																			<span class="kt-option__body">


                                                                                <select class="form-control" name="returnp" id="returnp">

                                                                                    @for($i = 5 ; $i < 105 ; $i = $i + 5)
                                                                                        <option value="{{$i/100}}">{{$i}}% </option>
                                                                                    @endfor
															</select>

																			</span>
																		</span>
                                </label>
                            </div>

                        </div>



                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="kt-option">

                                    <span class="kt-option__label">
																			<span class="kt-option__head">
																				<span class="kt-option__title">
																					Return to:
																				</span>

																			</span>
																			<span class="kt-option__body">


                                                                                <select class="form-control" name="warehouse_id" id="warehouse_id">

                                                                                    @foreach($wh as $a)
                                                                                        <option value="{{$a->id}}">{{$a->englishName}} </option>
                                                                                    @endforeach
															</select>

																			</span>
																		</span>
                                </label>
                            </div>

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