@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Base Controls
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-secondary" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                <div class="alert-text">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Requester</label>
                            <input type="text" disabled class="form-control" value="{{Auth()->user()->name}}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Request Product</label>
                            <select class="form-control" id="product_id">

                                @foreach($products as $p)

                                    <option value="{{$p->id}}">{{$p->englishName}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Static:</label>
                            <p class="form-control-static">email@example.com</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Example select</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect2">Example multiple select</label>
                            <select multiple="" class="form-control" id="exampleSelect2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group form-group-last">
                            <label for="exampleTextarea">Example textarea</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
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