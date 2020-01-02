@extends('layouts.main')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>



    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-12">

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="kt-portlet__head-title">
                                Requests waiting on me
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">

                            <div class="kt-section__content">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-head-solid">
                                        <thead>
                                        <tr>
                                            <th style="width: 5px">#</th>
                                            <th>Product</th>
                                            <th>Creation Date</th>
                                            <th>Last Update</th>
                                            <th>Created By</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="5"><span class="kt-font-bold">Click on request to update</span></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><code>*-success</code></td>
                                            <td><code>btn-success</code> <code>kt-font-success</code></td>
                                            <td><code>*-success</code></td>
                                            <td><code>btn-success</code> <code>kt-font-success</code></td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end::Portlet-->

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="kt-portlet__head-title">
                                My Requests
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Section-->
                        <div class="kt-section">

                            <div class="kt-section__content ">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-head-solid">
                                        <thead>
                                        <tr>
                                            <th style="width: 5px">#</th>
                                            <th>Product</th>
                                            <th>Creation Date</th>
                                            <th>Last Update</th>
                                            <th>Waiting on</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="5"><span class="kt-font-bold">Completed Requests</span></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>                                            <td><code>*-success</code></td>
                                            <td><code>btn-success</code> <code>kt-font-success</code></td>
                                            <td><code>*-success</code></td>
                                            <td><code>btn-success</code> <code>kt-font-success</code></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><span class="kt-font-bold">In Progress Requests</span></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>                                            <td><code>*-success</code></td>
                                            <td><code>btn-success</code> <code>kt-font-success</code></td>
                                            <td><code>*-success</code></td>
                                            <td><code>btn-success</code> <code>kt-font-success</code></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--end::Section-->
                    </div>
                </div>

                <!--end::Portlet-->
            </div>

        </div>
    </div>





@endsection