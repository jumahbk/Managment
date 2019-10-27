@extends('layouts.app')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();
    $title =   __('messages.addnew');

    ?>




    <div class="kt-portlet">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
											<span class="kt-portlet__head-icon">
												<i class="kt-font-brand flaticon2-line-chart"></i>
											</span>
                <h3 class="kt-portlet__head-title">
                    Export Tools
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <a href="#" class="btn btn-clean btn-icon-sm">
                        <i class="la la-long-arrow-left"></i>
                        Back
                    </a>
                    &nbsp;
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-brand btn-icon-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon2-plus"></i> Add New
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Choose an action:</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                        <span class="kt-nav__link-text">Reservations</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Appointments</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-bell-alarm-symbol"></i>
                                        <span class="kt-nav__link-text">Reminders</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-contract"></i>
                                        <span class="kt-nav__link-text">Announcements</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-shopping-cart-1"></i>
                                        <span class="kt-nav__link-text">Orders</span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator kt-nav__separator--fit">
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-rocket-1"></i>
                                        <span class="kt-nav__link-text">Projects</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-chat-1"></i>
                                        <span class="kt-nav__link-text">User Feedbacks</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-6 text-left"><div id="kt_table_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="kt_table_1"></label></div></div><div class="col-sm-6 text-right"><div class="dt-buttons btn-group flex-wrap">          <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="kt_table_1" type="button"><span>Print</span></button> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="kt_table_1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="kt_table_1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="kt_table_1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="kt_table_1" type="button"><span>PDF</span></button> </div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline" id="kt_table_1" role="grid" aria-describedby="kt_table_1_info" style="width: 1268px;">
                            <thead>


                            <tr role="row" >
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.name')}}

                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.companyname')}}


                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.nat')}}

                                </th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">


                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.title')}}

                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.gosi')}}


                                </th>


                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.mobile')}}


                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.email')}}

                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.birthdate')}}


                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 61.25px;" aria-label="Order ID: activate to sort column ascending">

                                    {{    __('messages.bankno')}}

                                </th>

                            </tr>












                            </thead>
                            <tbody>

                            @foreach($data as $d)
                                <tr role="row" class="even">
                                    <td class="">
                                    @if($locale == 'ar')
                                        {{$d->arabicName}}
                                    @else
                                        {{$d->englishName}}
                                    @endif

                                    <td class="">
                                        @if($locale == 'ar')
                                            {{$d->company->arabicName}}
                                        @else
                                            {{$d->company->englishName}}
                                        @endif
                                    </td>
                                    <td class="">
                                        @if($locale == 'ar')
                                            {{$d->nationality->arabicName}}
                                        @else
                                            {{$d->nationality->englishName}}
                                        @endif
                                    </td>
                                    <td class="">
                                        @if($d->title_id != 0)

                                            @if($locale == 'ar')
                                                {{$d->title->arabicName}}
                                            @else
                                                {{$d->title->englishName}}
                                            @endif
                                        @endif
                                    </td>
                                    <td class="">{{$d->gosi}}</td>
                                    <td class="">{{$d->mobile}}</td>
                                    <td class="">{{$d->email}}</td>

                                    <td class="">{{$d->birthdate}}</td>
                                    <td class="">{{$d->iban}}</td>



                                </tr>
                            @endforeach</tbody>
                            <tfoot>
                            <tr><th rowspan="1" colspan="1">Order ID</th><th rowspan="1" colspan="1">Country</th><th rowspan="1" colspan="1">Ship City</th><th rowspan="1" colspan="1">Ship Address</th><th rowspan="1" colspan="1">Company Agent</th><th rowspan="1" colspan="1">Company Name</th><th rowspan="1" colspan="1">Status</th><th rowspan="1" colspan="1">Type</th></tr>
                            </tfoot>
                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="kt_table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 40 entries</div></div><div class="col-sm-12 col-md-7 dataTables_pager"><div class="dataTables_length" id="kt_table_1_length"><label>Show <select name="kt_table_1_length" aria-controls="kt_table_1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_table_1_previous"><a href="#" aria-controls="kt_table_1" data-dt-idx="0" tabindex="0" class="page-link"><i class="la la-angle-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="kt_table_1_next"><a href="#" aria-controls="kt_table_1" data-dt-idx="5" tabindex="0" class="page-link"><i class="la la-angle-right"></i></a></li></ul></div></div></div></div>

            <!--end: Datatable -->
        </div>
    </div>





    <div class="kt-portlet kt-portlet--mobile col-md-12 ">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">

                <h3 class="kt-portlet__head-title">
                    {{    __('messages.general')}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        &nbsp;
                        <a href="./employees/create" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            {{    __('messages.addnew')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12">

                        <table name="example" class="table">
                            <thead>
                            <tr>
                                <th>

                                    {{    __('messages.name')}}

                                </th>
                                <th>

                                    {{    __('messages.companyname')}}


                                </th>
                                <th>

                                    {{    __('messages.nat')}}

                                </th>


                                <th>

                                    {{    __('messages.title')}}

                                </th>
                                <th>

                                    {{    __('messages.gosi')}}


                                </th>


                                <th>

                                    {{    __('messages.mobile')}}


                                </th>
                                <th>

                                    {{    __('messages.email')}}

                                </th>
                                <th>

                                    {{    __('messages.birthdate')}}


                                </th>
                                <th>

                                    {{    __('messages.bankno')}}

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $d)
                                <tr role="row" class="even">
                                    <td class="">
                                    @if($locale == 'ar')
                                        {{$d->arabicName}}
                                    @else
                                        {{$d->englishName}}
                                    @endif

                                    <td class="">
                                        @if($locale == 'ar')
                                            {{$d->company->arabicName}}
                                        @else
                                            {{$d->company->englishName}}
                                        @endif
                                    </td>
                                    <td class="">
                                    @if($locale == 'ar')
                                       {{$d->nationality->arabicName}}
                                    @else
                                       {{$d->nationality->englishName}}
                                    @endif
                                        </td>
                                    <td class="">
                                        @if($d->title_id != 0)

                                        @if($locale == 'ar')
                                            {{$d->title->arabicName}}
                                        @else
                                            {{$d->title->englishName}}
                                        @endif
                                        @endif
                                    </td>
                                    <td class="">{{$d->gosi}}</td>
                                    <td class="">{{$d->mobile}}</td>
                                    <td class="">{{$d->email}}</td>

                                    <td class="">{{$d->birthdate}}</td>
                                    <td class="">{{$d->iban}}</td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>






</div></div></div>

            <!--end: Datatable -->
        </div>
    </div>
<script>

    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection