@extends('layouts.com')

@section('content')







    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



    <form method="POST" action="/csources"  class="kt-form pt-5">
        @csrf

        <div class="row">


            <div class="col-md-6">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                انشاء جهة تواصل
                            </h3>
                        </div>
                    </div>





                    <!--begin::Form-->

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>جهة التواصل</label>
                            <input type="text" class="form-control"  name="name">
                        </div>
                        <div class="form-group">
                            <label>مسؤول التواصل</label>
                            <input type="text" class="form-control"  name="contactName">
                        </div>
                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" class="form-control"  name="address">
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
                                معلومات الاتصال
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->

                    <div class="kt-portlet__body">


                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input type="email" class="form-control"  name="email">
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="number" class="form-control"  name="phone">
                        </div>
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="number" class="form-control"  name="mobile">
                        </div>
                        <div class="form-group">
                            <label>رقم الفاكس</label>
                            <input type="number" class="form-control"  name="fax">
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-brand">حفظ</button>
                            </div>
                        </div>

                        <!--end::Form-->
                    </div>

                </div>
            </div>
    </form>



@endsection