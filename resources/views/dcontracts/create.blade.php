@extends('layouts.main')

@section('content')







    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



        <form method="POST" action="/devices"  class="kt-form pt-5">
            @csrf

<div class="row">


    <div class="col-md-6">

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Add new device
                </h3>
            </div>
        </div>


        <!--begin::Form-->

            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>English Name</label>
                    <input type="text" class="form-control"  name="englishName">
                </div>
                <div class="form-group">
                    <label>Arabic Name</label>
                    <input type="text" class="form-control"  name="arabicName">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <div >
                        <select class="form-control" name="department_id">
                            @foreach($departments as $t)
                                <option value="{{$t->id}}"> {{$t->englishName}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <div >
                        <select class="form-control" name="room_id">
                            @foreach($rooms as $t)
                                <option value="{{$t->id}}"> {{$t->englishName}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Vendor</label>
                    <div>
                        <select class="form-control" name="vendor_id">
                            @foreach($vendors as $t)
                                <option value="{{$t->id}}"> {{$t->englishName}} </option>
                            @endforeach
                        </select>
                    </div>
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
                         Details
                    </h3>
                </div>
            </div>


            <!--begin::Form-->

            <div class="kt-portlet__body">

                <div class="form-group">
                    <label>Purchase Date</label>
                    <div >
                        <input class="form-control" type="date" value="1900-01-01" name="purchased">
                    </div>
                </div>
                <div class="form-group">
                    <label>Warranty Expiry</label>
                    <div >
                        <input class="form-control" type="date" value="1900-01-01" name="warranty">
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