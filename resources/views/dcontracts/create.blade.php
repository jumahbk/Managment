@extends('layouts.main')

@section('content')







    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



        <form method="POST" action="/dcontracts" enctype="multipart/form-data" class="kt-form pt-5">
            @csrf

<div class="row">


    <div class="col-md-6">

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   New Maintenance Contract for {{$device->englishName}}
                </h3>
            </div>
        </div>

            <input type="hidden" name="device_id" value="{{$device_id}}" >
        <!--begin::Form-->

            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control"  name="startDate">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control"  name="endDate">
                </div>

                <div class="form-group">
                    <label>Details</label>
                    <textarea  class="form-control"  name="details"> </textarea>
                </div>

                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control"  name="amount">
                </div>

                <div class="form-group">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="vat"> Includes VAT
                        <span></span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="chargeAccount"> Charge Account?
                        <span></span>
                    </label>
                </div>


            </div>
        <!--end::Form-->
    </div>

</div>

    <div class="col-md-6">

        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                         Attachments
                    </h3>
                </div>
            </div>


            <!--begin::Form-->

            <div class="kt-portlet__body">

                <div class="form-group">
                    <label>Attachment 1</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="attachemnt1">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Attachment 2</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="attachemnt2">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Attachment 3</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="attachemnt3">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-brand">Submit</button>
                </div>
            </div>

            <!--end::Form-->
        </div>

    </div>
</div>
    </form>



@endsection