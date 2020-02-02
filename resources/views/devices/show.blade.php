@extends('layouts.main')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">

                <h3 class="kt-portlet__head-title">
                    Device Actions:
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="/stock/batchlist" class="btn btn-warning btn-elevate btn-icon-sm">
                            <i class="la la-folder"></i>
                            Add Maintainance Contract
                        </a>
                        <a href="/stock/productlist" class="btn btn-dark btn-elevate btn-icon-sm">
                            <i class="la la-barcode"></i>
                            Add Component
                        </a>&nbsp;
                        <a href="/stock/noqr" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                           Edit
                        </a>


                        <a href="stock/batchlistedit" class="btn btn-google btn-elevate btn-icon-sm">
                            <i class="la la-trash"></i>
                            Decommission
                        </a>

                    </div>
                </div>
            </div>
        </div></div>




        <div class="row">


            <div class="col-md-6">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Device Information
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>English Name</label>
                            <input type="text" class="form-control"  disabled = "true" name="englishName">
                        </div>
                        <div class="form-group">
                            <label>Arabic Name</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName">
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName" value="{{$d->department->englishName}}">

                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName" value="{{$d->room->englishName}}">

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
                            <label>Vendor</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName" value="{{$d->vendor->englishName}}">

                        </div>
                        <div class="form-group">
                            <label>Purchase Date</label>
                            <div >
                                <input class="form-control" type="date" value="1900-01-01" disabled = "true" name="purchased">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Warranty Expiry</label>
                            <div >
                                <input class="form-control" type="date" value="1900-01-01" disabled = "true" name="warranty">
                            </div>
                        </div>


                        <div class="form-group">
                            <label></label>
                            <div >

                            </div>
                        </div>
                        <!--end::Form-->
                    </div>

                </div>
            </div>
        </div>
    <div class="row">


        <div class="col-md-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Components
                        </h3>
                    </div>
                </div>


                <!--begin::Form-->

                <div class="kt-portlet__body">

                    <table class="table table-bordered" id="kt_table_3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $counter = 1;
                        ?>
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>61715-075</td>

                            <td nowrap></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <!--end::Form-->
            </div>

        </div>


    </div>
    <div class="row">


        <div class="col-md-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Contracts
                        </h3>
                    </div>
                </div>


                <!--begin::Form-->

                <div class="kt-portlet__body">

                    <table class="table table-bordered" id="kt_table_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Details</th>

                            <th>End</th>
                            <th>Cost</th>
                            <th>Attachment 1</th>
                            <th>Attachment 2</th>
                            <th>Attachment 3</th>


                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $counter = 1;
                        ?>
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>61715-075</td>
                            <td>China</td>
                            <td>Tieba</td>
                            <td>746 Pine View Junction</td>
                            <td>Nixie Sailor</td>

                            <td>3</td>
                            <td nowrap></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div>

<script>
    $(document).ready(function() {
        $('#kt_table_2').DataTable();
    } );
    $(document).ready(function() {
        $('#kt_table_3').DataTable();
    } );
</script>
                </div>
                <!--end::Form-->
            </div>

        </div>


    </div>
@endsection