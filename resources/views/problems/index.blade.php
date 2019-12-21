@extends('layouts.main')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>




    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Content Head -->

            <!-- end:: Content Head -->
            <!-- begin:: Content -->
            <div class="kt-container  kt-grid__item kt-grid__item--fluid">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">

                            <h3 class="kt-portlet__head-title">
                                Reported Issues:
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">

                                    &nbsp;
                                    <a href="/problems/create" class="btn btn-brand btn-elevate btn-icon-sm">
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

                                                Date Created

                                            </th>

                                            <th>

                                                Status

                                            </th>
                                            <th>
                                                Created by

                                            </th>
                                            <th>

                                                Issue

                                            </th>
                                            <th>

                                                Answer

                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($ps as $d)
                                            <tr role="row" class="even">
                                                <td><a href="/{{$d->id}}/edit">{{$d->id}}</a></td>
                                                <td class="">{{$d->created_at}}</td>
                                                <td class="">
                                                            @if($d->done)

                                                                Done
                                                                @else

                                                            Pending

                                                                @endif




                                                        </td>
                                                <td class="">{{$d->user->name}}</td>

                                                <td class="">{{$d->issue}}</td>
                                                <td class="">{{$d->answer}}</td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>






                                </div></div>

                    </div>
                </div>	</div>
            <!-- end:: Content -->							</div>
    </div>






@endsection