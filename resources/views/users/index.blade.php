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
                                    <a href="/users/create" class="btn btn-brand btn-elevate btn-icon-sm">
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

                                               ID

                                            </th>
                                            <th>

                                               Name

                                            </th>

                                            <th>

                                                Email


                                            </th>
                                            <th>

                                                Role


                                            </th>
                                            <th>

                                                Stock Role

                                            </th>
                                            <th>

                                                Actions

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $d)
{{--                                            @if($d->disposable == 1)--}}
{{--                                                @continue;--}}
{{--                                            @endif--}}
                                            <tr role="row" class="even">
                                                <td class="">{{$d->id}}</td>
                                                <td class="">{{$d->name}} </td>

                                                <td class="">{{$d->email}}</td>
                                                <td class="">{{$d->role}}</td>
                                                <td class="">{{$d->stock_request_role}}</td>
                                                <td class="">

                                                    @if($d->disabled == 0)

                                                        <a href="/users/{{$d->id}}/disable" class="btn btn-google btn-elevate btn-icon-sm">
                                                            <i class="la la-trash"></i>
                                                            Disable
                                                        </a>


                                                    @else
                                                        <a href="/users/{{$d->id}}/enable" class="btn btn-font-light btn-elevate btn-icon-sm">
                                                            <i class="la la-check"></i>
                                                            Enable
                                                        </a>
                                                    @endif

                                                </td>


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