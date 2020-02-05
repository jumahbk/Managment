@extends('layouts.main')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">

                <h3 class="kt-portlet__head-title">
                    Device Actions:
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="/dcontracts/{{$d->id}}/create" class="btn btn-warning btn-elevate btn-icon-sm">
                            <i class="la la-folder"></i>
                            Add Maintenance Contract
                        </a>
                        <a href="/devices/{{$d->id}}/create" class="btn btn-dark btn-elevate btn-icon-sm">
                            <i class="la la-barcode"></i>
                            Add Component
                        </a>&nbsp;
                        <a href="/devices/{{$d->id}}/edit" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                           Edit
                        </a>


                        <a href="/devices/{{$d->id}}/destroy" class="btn btn-google btn-elevate btn-icon-sm">
                            <i class="la la-trash"></i>
                            Decommission
                        </a>

                    </div>
                </div>
            </div>
        </div></div>




        <div class="row">


            <div class="col-md-6">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                @if($d->device_id)

                                    Component Information <a href="/devices/{{$d->device_id}}">( Part of {{$d->parent->englishName}})</a>

                                    @else


                                Device Information

                                    @endif
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>English Name</label>
                            <input type="text" class="form-control"  value="{{$d->englishName}}" disabled = "true" name="englishName">
                        </div>
                        <div class="form-group">
                            <label>Arabic Name</label>
                            <input type="text" class="form-control"  value="{{$d->arabicName}}" disabled = "true" name="arabicName">
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName" value="{{$d->department->englishName}}">

                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName" value="{{$d->room->englishName}}">

                        </div>


                    </div>
                    <!--end::Form-->
                </div>

            </div>

            <div class="col-md-6">

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Details
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>Vendor</label>
                            <input type="text" class="form-control"  valu disabled = "true" name="arabicName" value="{{$d->vendor->englishName}}">

                        </div>
                        <div class="form-group">
                            <label>Purchase Date</label>
                            <div >
                                <input class="form-control" type="date" value="1900-01-01" disabled = "true" name="purchased">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Warranty Expiry</label>
                            <div >
                                <input class="form-control" type="date" value="1900-01-01" disabled = "true" name="warranty">
                            </div>
                        </div>


                        <div class="form-group">
                            <label></label>
                            <div >

                            </div>
                        </div>
                        <!--end::Form-->
                    </div>

                </div>
            </div>
        </div>
    <div class="row">


        <div class="col-md-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Components
                        </h3>
                    </div>
                </div>


                <!--begin::Form-->

                <div class="kt-portlet__body">

                    <table class="table">
                        <thead class="border-bottom">
                        <tr>

                            <td style=" ">Name</td>
                            <td style=" ">Room</td>
                            <td style=" ">Department</td>

                            <td style=" ">Vendor</td>
                            <td style=" ">Warranty</td>
                            <td style=" "></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($d->devices as $dz)
                            <tr class="border-bottom">
                                <td>
                                    <a href="/devices/{{$dz->id}}"> {{$dz->englishName}}</a>
                                </td>
                                <td>
                                    {{$dz->room->englishName}}
                                </td>
                                <td>
                                    {{$dz->department->englishName}}
                                </td>

                                <td>
                                    {{$dz->vendor->englishName}}
                                </td>
                                <td>
                                    <?php echo $dz->getExpiry() ?>
                                </td>

                                <td>

                                    @if($d->deleted == 0)
                                        <form action="{{ route('devices.destroy',$dz->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-label-danger btn-bold btn-icon-h kt-margin-l-10">
                                                {{    __('messages.deactivate')}}

                                            </button>
                                        </form>
                                    @else

                                        <form action="/devices/restore" method="POST">

                                            @csrf
                                            <input type="hidden" name="id" value="{{$dz->id}}">
                                            <button type="submit" class="btn btn-label-twitter btn-bold btn-icon-h kt-margin-l-10">
                                                {{    __('messages.activate')}}

                                            </button>
                                        </form>

                                    @endif

                                </td><td>
                                    <a href="/devices/{{$dz->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                        {{    __('messages.edit')}}

                                    </a>





                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!--end::Form-->
            </div>

        </div>


    </div>
    <div class="row">


        <div class="col-md-12">

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Contracts
                        </h3>
                    </div>
                </div>


                <!--begin::Form-->

                <div class="kt-portlet__body">

                    <table class="table" id="kt_table_2">
                        <thead class="border-bottom">
                        <tr>

                            <td style=" ">Device</td>
                            <td style=" ">Expiry</td>
                            <td>Details</td>
                            <td style=" ">Attachment 1</td>
                            <td style=" ">Attachment 2</td>
                            <td style=" ">Attachment 3</td>
                            <td style=" "></td>
                            <td style=" "></td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($d->Devicecontracts as $data)
                            <tr class="border-bottom">
                                <td>
                                    <a href="/devices/{{$data->device->id}}">  {{$data->device->englishName}}</a>
                                </td>
                                <td>
                                    {{$data->endDate}}
                                </td>
                                <td>
                                    {{$data->details}}
                                </td>

                                <td>
                                    @if($data->attachemnt1 != null)
                                        <a href="{{$data->attachemnt1}}">Download</a>
                                    @endif
                                </td>
                                <td>
                                    @if($data->attachemnt2 != null)
                                        <a href="{{$data->attachemnt2}}">Download</a>
                                    @endif
                                </td>
                                <td>
                                    @if($data->attachemnt3 != null)
                                        <a href="{{$data->attachemnt3}}">Download</a>
                                    @endif
                                </td>


                                <td>

                                    @if($data->deleted == 0)
                                        <form action="{{ route('devices.destroy',$d->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-label-danger btn-bold btn-icon-h kt-margin-l-10">
                                                {{    __('messages.deactivate')}}

                                            </button>
                                        </form>
                                    @else

                                        <form action="/devices/restore" method="POST">

                                            @csrf
                                            <input type="hidden" name="id" value="{{$d->id}}">
                                            <button type="submit" class="btn btn-label-twitter btn-bold btn-icon-h kt-margin-l-10">
                                                {{    __('messages.activate')}}

                                            </button>
                                        </form>

                                    @endif

                                </td><td>
                                    <a href="/devices/{{$d->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                        {{    __('messages.edit')}}

                                    </a>





                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div>

<script>
    $(document).ready(function() {
        $('#kt_table_2').DataTable();
    } );
    $(document).ready(function() {
        $('#kt_table_3').DataTable();
    } );
</script>
                </div>
                <!--end::Form-->
            </div>

        </div>


    </div>
@endsection