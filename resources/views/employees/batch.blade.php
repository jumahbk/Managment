@extends('layouts.main')

@section('content')
<?php

        $title = "Batch Add";

?>
    <div class="kt-portlet col-md-9">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create Title
                </h3>
            </div>
        </div>

        <!--begin::Form-->


            <form method="POST" action="/employees"  class="kt-form kt-form--label-right">
                @csrf


            <div class="kt-portlet__body col-md-12">
                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">English Name; arabic name</label>
                    <div class="col-lg-3">
                        <input type="hidden" id="batch" name="batch" value="1" />
                        <textarea id="data" name="data" type="text" class="form-control" rows="200" cols="500" ></textarea>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-brand">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

@endsection