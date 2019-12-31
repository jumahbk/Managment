@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Create new user
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-secondary" role="alert">
{{--                                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>--}}
{{--                                <div class="alert-text">--}}
{{--                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text"  name='name' class="form-control"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"  name="email" class="form-control"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password"  name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>



                        <div class="form-group">
                            <label for="exampleSelect1">Role Type:</label>
                            <select class="form-control" id="role_id">

                                @foreach($r as $p)

                                    <option value="{{$p->id}}">{{$p->englishName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Stock Role Type:</label>
                            <select class="form-control" id="stockrole_id">

                                @foreach($sr as $p)

                                    <option value="{{$p->id}}">{{$p->englishName}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions rtl">
                            <button type="reset" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->

            <!--end::Portlet-->
        </div>

    </div>
@endsection