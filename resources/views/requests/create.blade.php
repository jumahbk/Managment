@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Request Product
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form method="POST" action="/requests"  class="kt-form">
                    @csrf
                    <div class="kt-portlet__body">

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
                            <label for="exampleSelect1">First Approval</label>
                            <select class="form-control" id="product_id">

                                @foreach($sr as $p)
                                    @if($p->englishName == 'Doctor')
                                        @foreach($p->users as $z)
                                            <option value="{{$z->id}}">{{$z->name}}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Pharmacist</label>
                            <select class="form-control" id="product_id">

                                @foreach($sr as $p)
                                    @if($p->englishName == 'Pharmacist')
                                        @foreach($p->users as $z)
                                            <option value="{{$z->id}}">{{$z->name}}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Accountant</label>
                            <select class="form-control" id="product_id">

                                @foreach($sr as $p)
                                    @if($p->englishName == 'Accountant')
                                        @foreach($p->users as $z)
                                            <option value="{{$z->id}}">{{$z->name}}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>





                        <div class="form-group">
                            <label for="exampleInputPassword1">Proposed Quantity</label>
                            <input type="number" class="form-control"  >
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Comments</label>
                            <input type="text" class="form-control"  name="comments" >
                        </div>


                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>

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