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
                        <div class="form-group">
                            <label>Short Form Name</label>

                        </div>

                    </div>
                    <!--end::Form-->
                </div>

            </div>

            <div class="col-md-6 hidden" name="letterTypeDiv" id="letterTypeDiv">

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
                            <input type="text" class="form-control"  name="mainContact">
                        </div>
                        <div class="form-group">
                            <label>Primary Email</label>
                            <input type="email" class="form-control"  name="mainContactNumber">
                        </div>
                        <div class="form-group">
                            <label>Primary Phone</label>
                            <input type="number" class="form-control"  name="mainContactEmail">
                        </div>
                        <div class="kt-separator kt-separator--dashed"></div>

                        <div class="form-group">
                            <label>Secondary Contact</label>
                            <input type="text" class="form-control"  name="secondContact">
                        </div>
                        <div class="form-group">
                            <label>Secondary Email</label>
                            <input type="email" class="form-control"  name="secondContactNumber">
                        </div>
                        <div class="form-group">
                            <label>Secondary Phone</label>
                            <input type="number" class="form-control"  name="secondContactEmail">
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