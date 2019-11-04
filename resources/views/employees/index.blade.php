@extends('layouts.main')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();
    $title =   __('messages.addnew');

    ?>





    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
											<span class="kt-portlet__head-icon">
												<i class="kt-font-brand flaticon2-line-chart"></i>
											</span>
                <h3 class="kt-portlet__head-title">
                    HTML(DOM) Sourced Data
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Export
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Choose an option</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-print"></i>
                                            <span class="kt-nav__link-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-copy"></i>
                                            <span class="kt-nav__link-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                            <span class="kt-nav__link-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                            <span class="kt-nav__link-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                            <span class="kt-nav__link-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        &nbsp;
                        <a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Record
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
                    <th >

                        {{    __('messages.companyname')}}


                    </th>
                    <th >

                        {{    __('messages.nat')}}

                    </th >


                    <th >

                        {{    __('messages.title')}}

                    </th>
                    <th >

                        {{    __('messages.gosi')}}


                    </th>


                    <th >

                        {{    __('messages.mobile')}}


                    </th>
                    <th >

                        {{    __('messages.email')}}

                    </th>
                    <th >

                        {{    __('messages.birthdate')}}


                    </th>
                    <th >

                        {{    __('messages.bankno')}}

                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $d)
                    <tr role="row" class="even">
                        <td>{{$d->id}}</td>

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
                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
    </div>





            <!--end: Datatable -->
        </div>
    </div>
<script>


    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection