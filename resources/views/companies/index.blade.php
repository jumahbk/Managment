@extends('layouts.app')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>

    <div class="kt-portlet kt-portlet--mobile col-md-9 ">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
											<span class="kt-portlet__head-icon">
												<i class="kt-font-brand flaticon2-line-chart"></i>
											</span>
                <h3 class="kt-portlet__head-title">
                    {{    __('messages.typelist')}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        &nbsp;
                        <a href="./companies/create" class="btn btn-brand btn-elevate btn-icon-sm">
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

                        <table class="table">
                            <thead>
                            <tr>
                                <th>

                                    {{    __('messages.englishName')}}

                                </th>
                                <th>

                                    {{    __('messages.arabicName')}}


                                </th>
                                <th>

                                    {{    __('messages.actions')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $d)
                                <tr role="row" class="even">

                                    <td class="">{{$d->englishName}}</td>
                                    <td class="">{{$d->arabicName}}</td>

                                    <td class="">

                                        <a href="#" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                                            {{    __('messages.viewall')}}

                                        </a>
                                        <a href="/nationalities/{{$d->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                            {{    __('messages.edit')}}

                                        </a>


                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>






</div></div></div>

            <!--end: Datatable -->
        </div>
    </div>

@endsection