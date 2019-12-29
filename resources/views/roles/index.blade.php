@extends('layouts.main')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>




    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
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
                                    <a href="/roles/create" class="btn btn-brand btn-elevate btn-icon-sm">
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
                                            <th>ID</th>
                                            <th>

                                                {{    __('messages.englishName')}}

                                            </th>


                                            <th>

                                                {{    __('messages.arabicName')}}


                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $d)

                                            <tr role="row" class="even">
                                                <td>{{$d->id}}</td>
                                                <td class="">{{$d->englishName}}</td>
                                               <td class="">{{$d->arabicName}}</td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>






                                </div>


                </div>

                    </div>
                </div>









    </div>
            <!-- end:: Content -->							</div>
    </div>






@endsection