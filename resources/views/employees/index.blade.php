@extends('layouts.app')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>

    <div class="kt-portlet kt-portlet--mobile col-md-12 ">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
											<span class="kt-portlet__head-icon">
												<i class="kt-font-brand flaticon2-line-chart"></i>
											</span>
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

                        <table class="table">
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

                                    <td class="">{{$d->englishName}}</td>
                                    <td class="">{{$d->arabicName}}</td>

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

@endsection