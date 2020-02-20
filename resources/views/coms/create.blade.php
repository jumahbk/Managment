@extends('layouts.com')

@section('content')




    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



    <form method="POST" action="/banks"  class="kt-form pt-5">
        @csrf

        <div class="row">


            <div class="col-md-7">

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
                        <input type="hidden" name="internal_id" value="{{$inid}}">
                        </div>
                        
                        <div class="form-group">
                            <label>الجهه</label>
                            <select class="form-control" name="source_id" id="source_id"onchange="destination()">

                                <option value="-1"> جهه جديده</option>
                                @foreach($dests as $d)
                                    <option value="{{$d->id}}">  {{$d->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>نوع الصادر</label>
                            <select class="form-control" name="letterType_id" id="letterType_id" onchange="letterType()">

                                <option value="-1"> نوع جديد </option>
                                @foreach($ltypes as $d)
                                    <option value="{{$d->id}}">  {{$d->englishName}} </option>
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group">
                            <label>موضوع الصادر</label>
                            <input type="text" class="form-control"  name="subject">
                        </div>
                            <input type="hidden" name="in" value="false">

                        <div class="form-group">
                            <label>ملاحظات</label>
                            <input type="text" class="form-control"  name="notes">
                        </div>

                        <div class="form-group">
                            <label>التاريخ</label>
                            <input type="date" class="form-control"  name="actionDate">
                        </div>
                        <div class="form-group">
                            <label>مرفقات ١</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="attachemnt1">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>مرفقات ٢</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="attachemnt2">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>مرفقات ٣</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="attachemnt3">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>




                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-brand  align-right">حفظ</button>
                            </div>
                        </div>

                    </div>
                    <!--end::Form-->
                </div>

            </div>

            <div class="col-md-5 hidden" name="letterTypeDiv" id="letterTypeDiv">

                <div class="row" id="typediv">

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
                <div class="row" id="destinationdiv">

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
    var x = document.getElementById("typediv");
        var e = document.getElementById("letterType_id");
        var selected = e.options[e.selectedIndex].value;
    if (selected === "-1") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }


    function destination(){
        var x = document.getElementById("destinationdiv");
        var e = document.getElementById("source_id");
        var selected = e.options[e.selectedIndex].value;
        if (selected === "-1") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

@endsection