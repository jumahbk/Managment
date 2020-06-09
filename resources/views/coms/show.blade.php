@extends('layouts.com')

@section('content')


    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content Head -->
            <div class="kt-subheader align-right  kt-grid__item" id="kt_subheader">

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">

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


                <div class="col-xl-12">

                    <!--begin:: Widgets/Application Sales-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    التفاصيل
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">

                                        &nbsp;

                                        <a href="./coms/{{$d->id}}/true/answer" class="btn btn-brand btn-elevate btn-icon-sm">
                                            <i class="la la-plus"></i>
                             خطاب ملحق
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="kt_widget11_tab1_content">

                                    <!--begin::Widget 11-->
                                    <div class="kt-widget11">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="border-bottom">
                                                <tr>

                                                    <td style=" ">نوع الخطاب</td>
                                                    <td style=" ">الجهه</td>
                                                    <td style=" ">الموضوع</td>
                                                    <td style=" ">ملاحظات</td>
                                                    <td style=" ">التاريخ</td>
                                                    <td style=" ">مرفقات ١</td>
                                                    <td style=" ">مرفقات ٢</td>
                                                    <td style=" ">مرفقات ٣</td>

                                                    <td style=" "></td>

                                                    <td style=" "></td>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                    <tr class="border-bottom">
                                                        <td>
                                                           {{$d->letterType->englishName}}
                                                        </td>
                                                        <td>
                                                            {{$d->communicators->name}}
                                                        </td>
                                                        <td>
                                                            {{$d->subject}}
                                                        </td>
                                                        <td>
                                                            {{$d->notes}}
                                                        </td>
                                                        <td>
                                                            {{$d->actionDate}}
                                                        </td>
                                                        <td>
                                                            @if($d->attachment1 != null)
                                                                <a href="{{$d->attachment1}}">عرض</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($d->attachment2 != null)
                                                                <a href="{{$d->attachment2}}">عرض</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($d->attachment3 != null)
                                                                <a href="{{$d->attachment3}}">عرض</a>
                                                            @endif
                                                        </td>






                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="kt-widget11__action kt-align-right">
                                        </div>
                                    </div>

                                    <!--end::Widget 11-->
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Application Sales-->
                </div>

            </div>
        </div>

        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content Head -->
            <div class="kt-subheader align-right  kt-grid__item" id="kt_subheader">

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">

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


                <div class="col-xl-12">

                    <!--begin:: Widgets/Application Sales-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                قائمة الردود
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="kt_widget11_tab1_content">

                                    <!--begin::Widget 11-->
                                    <div class="kt-widget11">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="border-bottom">
                                                <tr>

                                                    <td style=" ">نوع الخطاب</td>
                                                    <td style=" ">الجهه</td>
                                                    <td style=" ">الموضوع</td>
                                                    <td style=" ">ملاحظات</td>
                                                    <td style=" ">التاريخ</td>
                                                    <td style=" ">مرفقات ١</td>
                                                    <td style=" ">مرفقات ٢</td>
                                                    <td style=" ">مرفقات ٣</td>

                                                    <td style=" "></td>
                                                    <td style=" "></td>

                                                    <td style=" "></td>
                                                    <td style=" "></td>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($kids as $d)

                                                        <tr class="border-bottom">
                                                        <td>
                                                            {{$d->letterType->englishName}}
                                                        </td>
                                                        <td>
                                                            {{$d->communicators->name}}
                                                        </td>
                                                        <td>
                                                            {{$d->subject}}
                                                        </td>
                                                        <td>
                                                            {{$d->notes}}
                                                        </td>
                                                        <td>
                                                            {{$d->actionDate}}
                                                        </td>
                                                        <td>
                                                            @if($d->attachment1 != null)
                                                                <a href="{{$d->attachment1}}">عرض</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($d->attachment2 != null)
                                                                <a href="{{$d->attachment2}}">عرض</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($d->attachment3 != null)
                                                                <a href="{{$d->attachment3}}">عرض</a>
                                                            @endif
                                                        </td>



                                                        <td width="50px">






                                                        </td>




                                                    </tr>

                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="kt-widget11__action kt-align-right">
                                        </div>
                                    </div>

                                    <!--end::Widget 11-->
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Application Sales-->
                </div>

            </div>
        </div>





    </div>
    <!-- end:: Content -->							</div>
    </div>


@endsection