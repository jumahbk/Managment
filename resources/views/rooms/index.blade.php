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

                            <h3 class="kt-portlet__head-title">
                                Room List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">

                                    &nbsp;
                                    <a href="/rooms/create" class="btn btn-brand btn-elevate btn-icon-sm">
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

                                                Name

                                            </th>
                                            <th>

                                                Department


                                            </th>
                                            <th>

                                                Branch

                                            </th>



                                            <th>

                                                Company

                                            </th>
                                            <th>

                                                {{    __('messages.actions')}}

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $d)
                                            <tr role="row" class="even">
                                                <td class="">{{$d->englishName}} </td>
                                                <td class="">{{$d->department->englishName}} </td>

                                                <td class="">{{$d->branch->englishName}} </td>
                                                <td class="">{{$d->branch->company->englishName}}</td>

                                                <td class="">
                                                    @if($d->deleted == 0)
                                                        <form action="{{ route('rooms.destroy',$d->id) }}" method="POST">

                                                            @csrf
                                                            @method('DELETE')
                                                    <button type="submit" class="btn btn-label-danger btn-bold btn-icon-h kt-margin-l-10">
                                                        {{    __('messages.deactivate')}}

                                                    </button>
                                                        </form>
                                                    @else

                                                        <form action="/rooms/restore" method="POST">

                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$d->id}}">
                                                            <button type="submit" class="btn btn-label-twitter btn-bold btn-icon-h kt-margin-l-10">
                                                                {{    __('messages.activate')}}

                                                            </button>
                                                        </form>

                                                    @endif
                                                    <a href="/rooms/{{$d->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                                        {{    __('messages.edit')}}

                                                    </a>


                                                </td>

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