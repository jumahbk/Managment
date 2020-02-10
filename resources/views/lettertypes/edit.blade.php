@extends('layouts.main')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>





    <form method="POST" action="{{ route('banks.update',$d->id) }}"  class="kt-form pt-5">
        @method('PATCH')
        @csrf

    <div class="row">


        <div class="col-md-6">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Bank Details
                        </h3>
                    </div>
                </div>


                <!--begin::Form-->

                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>English Name</label>
                        <input type="text" class="form-control"  name="englishName"  value="{{$d->englishName}}">
                    </div>
                    <div class="form-group">
                        <label>Arabic Name</label>
                        <input type="text" class="form-control"  name="arabicName" value="{{$d->arabicName}}" >
                    </div>
                    <div class="form-group">
                        <label>Short Form Name</label>
                        <input type="text" class="form-control"  name="short" value="{{$d->short}}">
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
                            Contact Details
                        </h3>
                    </div>
                </div>


                <!--begin::Form-->

                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label>Primary Contact</label>
                        <input type="text" class="form-control"  name="mainContact" value="{{$d->mainContact}}">
                    </div>
                    <div class="form-group">
                        <label>Primary Email</label>
                        <input type="email" class="form-control"  name="mainContactNumber" value="{{$d->mainContactNumber}}">
                    </div>
                    <div class="form-group">
                        <label>Primary Phone</label>
                        <input type="number" class="form-control"  name="mainContactEmail" value="{{$d->mainContactEmail}}">
                    </div>
                    <div class="kt-separator kt-separator--dashed"></div>

                    <div class="form-group">
                        <label>Secondary Contact</label>
                        <input type="text" class="form-control"  name="secondContact" value="{{$d->secondContact}}">
                    </div>
                    <div class="form-group">
                        <label>Secondary Email</label>
                        <input type="email" class="form-control"  name="secondContactNumber" value="{{$d->secondContactNumber}}">
                    </div>
                    <div class="form-group">
                        <label>Secondary Phone</label>
                        <input type="number" class="form-control"  name="secondContactEmail" value="{{$d->secondContactEmail}}">
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