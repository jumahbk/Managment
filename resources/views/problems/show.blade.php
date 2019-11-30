@extends('layouts.main')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet col-md-12">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{    __('messages.showvendorinfo')}}
                </h3>
            </div>
            <div class="kt-portlet__head-actions pt-3">

                &nbsp;
                <a href="/vendors/{{$d->id}}/edit" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    {{    __('messages.edit')}}
                </a>
            </div>

        </div>

        <!--begin::Form-->


        <form method="POST" action="/vendors"  class="kt-form kt-form--label-right">
            @csrf


            <div class="kt-portlet__body col-md-9">

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.englishName')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->englishName}}" id="englishName" name="englishName" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.arabicName')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->arabicName}}" id="arabicName" name="arabicName" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.phone')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->phone}}" id="phone" name="phone" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.cr')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->cr}}" id="cr" name="cr" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>


                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.contactName')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->contactName}}" id="contactName" name="contactName" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.mobile')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->mobile}}" id="mobile" name="mobile" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>

                <div class="form-group row form-group-marginless kt-margin-t-20">
                    <label class="col-lg-3 col-form-label">      {{    __('messages.contactName2')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->contactName2}}" id="contactName2" name="contactName2" type="text" class="form-control" dlder="Full name">
                    </div>
                    <label class="col-lg-3 col-form-label">{{    __('messages.mobile2')}}:</label>
                    <div class="col-lg-3">
                        <input disabled value="{{$d->mobile2}}" id="mobile2" name="mobile2" type="text" class="form-control" dlder="الاسم العربي">
                    </div>

                </div>


            </div>

        </form>






        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content Head -->
            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                <div class="kt-container ">

                    <div class="kt-subheader__toolbar">

                    </div>
                </div>
            </div>
            <!-- end:: Content Head -->
            <!-- begin:: Content -->
            <div class="kt-container  kt-grid__item kt-grid__item--fluid">
                @if(isset($warning))
                    <div class="alert alert-light alert-elevate" role="alert">


                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                        <div class="alert-text">

                            {{$warning}}
                        </div>

                    </div>
                @endif
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
                            <h3 class="kt-portlet__head-title">
                                {{    __('messages.productlist')}}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">

                                    &nbsp;
                                    <a href="/products/create" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{    __('messages.addnew')}}
                                    </a>
                                </div>
                            </div>		</div>
                    </div>

                    <div class="kt-portlet__body">



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

                                    {{    __('messages.unit')}}


                                </th>
                                <th>

                                    {{    __('messages.low')}}


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
                                    <td class="">{{$d->unit->englishName}}</td>
                                    <td class="">{{$d->low}}</td>

                                    <td class="">
                                        @if($d->deleted == 0)
                                            <a href="/products/{{$d->id}}/deactivate" class="btn btn-label-danger btn-bold btn-icon-h kt-margin-l-10">
                                                {{    __('messages.deactivate')}}

                                            </a>
                                        @else

                                            <a href="/products/{{$d->id}}/activate" class="btn btn-label-info btn-bold btn-icon-h kt-margin-l-10">
                                                {{    __('messages.activate')}}

                                            </a>

                                        @endif
                                        <a href="/products/{{$d->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                            {{    __('messages.edit')}}

                                        </a>


                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>






                    </div></div>

            </div>
        </div>

        <!--end::Form-->
    </div>

@endsection