@extends('layouts.main')

@section('content')
    <?php

    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet col-md-12">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Answer Issue
                </h3>
            </div>
        </div>

        <!--begin::Form-->


        <form method="POST" action="{{ route('problems.update',$p->id)}}"  class="kt-form kt-form--label-right">
            @method('PATCH')
            @csrf
            <div class="kt-portlet__body col-md-9">

                <div class="kt-portlet__body col-md-12">
                    <div class="form-group row form-group-marginless kt-margin-t-20">
                        <label class="col-lg-3 col-form-label">Issue Description</label>
                        <div class="col-lg-12">
                            <input type="hidden" id="id" name="id" value="{{$p->id}}" />

                            <p class="form-control">{{$p->issue}}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body col-md-12">
                    <div class="form-group row form-group-marginless kt-margin-t-20">
                        <label class="col-lg-3 col-form-label">Answer</label>
                        <div class="col-lg-12">
                            <textarea id="answer"   name="answer" type="text" class="form-control" rows="20" cols="500" ></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-brand">{{    __('messages.save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

@endsection