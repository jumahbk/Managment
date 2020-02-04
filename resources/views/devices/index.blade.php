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


                    <div class="col-xl-12">

                        <!--begin:: Widgets/Application Sales-->
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Device List
                                    </h3>
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

                                                        <td style=" ">Name</td>
                                                        <td style=" ">Room</td>
                                                        <td style=" ">Department</td>

                                                        <td style=" ">Vendor</td>
                                                        <td style=" ">Warranty</td>
                                                        <td style=" ">Vendor</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($data as $d)
                                                    <tr class="border-bottom">
                                                        <td>
                                                           <a href="/devices/{{$d->id}}"> {{$d->englishName}}</a>
                                                        </td>
                                                        <td>
                                                            {{$d->room->englishName}}
                                                        </td>
                                                        <td>
                                                            {{$d->department->englishName}}
                                                        </td>

                                                        <td>
                                                            {{$d->vendor->englishName}}
                                                        </td>
                                                        <td>
                                                           <?php echo $d->getExpiry() ?>
                                                        </td>

                                                        <td>

                                                            @if($d->deleted == 0)
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
                                                            <span class="kt-widget11__sub">
                                                            <a href="/devices/{{$d->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                                                Restore

                                                            </a>

                                                            </span>

                                                                <a href="/devices/{{$d->id}}/edit" class="btn btn-label-warning btn-bold btn-icon-h kt-margin-l-10">
                                                                    {{    __('messages.edit')}}

                                                                </a>





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
                </div>	</div>
            <!-- end:: Content -->							</div>
    </div>

    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-blue-sharp"></i>
                    <span class="caption-subject font-blue-sharp bold uppercase">Default Tree</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>
            <div id="evts" class="demo"></div>
            <script>
                $('#evts')
                    .on("changed.jstree", function (e, data) {
                        if(data.selected.length) {
                            alert('The selected node is: ' + data.instance.get_node(data.selected[0]).text);
                        }
                    })
                    .jstree({
                        'core' : {
                            'multiple' : false,
                            'data' : [
                                { "text" : "Root node", "children" : [
                                        { "text" : "Child node 1", "id" : 1 },
                                        { "text" : "Child node 2" }
                                    ]}
                            ]
                        }
                    });
            </script>
        </div>
    </div>

@endsection

