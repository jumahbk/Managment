
@extends('layouts.com')
<title>{{$t}}</title>

@section('content')







    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



        <form method="POST" action="/lettertypes"  class="kt-form pt-5">
            @csrf

<div class="row">


    <div class="col-md-6">

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    اضافة نوع خطاب
                </h3>
            </div>
        </div>


        <!--begin::Form-->

            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" class="form-control"  name="englishName">
                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-brand">حفظ</button>
                    </div>
                </div>

            </div>
        <!--end::Form-->
    </div>

</div>


    </form>



@endsection