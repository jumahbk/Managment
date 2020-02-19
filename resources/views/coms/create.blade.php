@extends('layouts.com')

@section('content')




    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



    <form method="POST" action="/banks"  class="kt-form pt-5">
        @csrf

        <div class="row">


            <div class="col-md-6">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                معلومات الصادر
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <h3>     رقم الصادر {{$inid}}  </h3>

                        </div>
                        
                        <div class="form-group">
                            <label>الجهه</label>
                            <select class="form-control" name="source_id">

                                <option value="-1"> جهه جديده</option>
                                <option value="1"> نوع  </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>نوع الصادر</label>
                            <select class="form-control" name="letterType_id" onchange="letterType()">

                                <option value="-1"> نوع جديد </option>
                                <option value="1"> نوع  </option>


                            </select>
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

            <div class="col-md-6 hidden" name="letterTypeDiv" id="letterTypeDiv">

                <div class="row">

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



                        </div>
                        <!--end::Form-->
                    </div>

                </div>
                <div class="row">

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


                        </div>
                        <!--end::Form-->




                    </div>

                </div>



            </div>
    </form>


<script>
    function letterType(){
    var x = document.getElementById("letterTypeDiv");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }



</script>

@endsection