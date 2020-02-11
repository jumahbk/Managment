@extends('layouts.com')

@section('content')
    <?php
    App::setLocale(Session::get('applocale'));

    $locale = App::getLocale();

    ?>
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
			<i class="la la-leaf"></i>
			</span>
                <h3 class="kt-portlet__head-title">
                    Fluid Pricing Table
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-pricing-1">
                <div class="kt-pricing-1__items row">
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-brand"><i class="fa flaticon-piggy-bank"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">Free</span>
                        <h2 class="kt-pricing-1__subtitle">1 End Product License</h2>
                        <span class="kt-pricing-1__description">
						<span>Lorem ipsum aret</span>
						<span>sed do eiusmod</span>
						<span>magna siad ali</span>
					</span>
                        <div class="kt-pricing-1__btn">
                            <button type="button" class="btn btn-brand btn-custom btn-pill btn-wide btn-uppercase btn-bolder btn-sm">Purchase</button>
                        </div>
                    </div>
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-success"><i class="fa flaticon-confetti"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">69<span class="kt-pricing-1__label">$</span></span>
                        <h2 class="kt-pricing-1__subtitle">Business License</h2>
                        <span class="kt-pricing-1__description">
						<span>Lorem ipsum</span>
						<span>sed do eiusmod</span>
						<span>magna siad enim aliqua</span>
					</span>
                        <div class="kt-pricing-1__btn">
                            <button type="button" class="btn btn-success btn-wide btn-uppercase btn-bolder btn-sm">Purchase</button>
                        </div>
                    </div>
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-danger"><i class="fa flaticon-rocket"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">548<span class="kt-pricing-1__label">$</span></span>
                        <h2 class="kt-pricing-1__subtitle">Enterprice License</h2>
                        <span class="kt-pricing-1__description">
						<span>Lorem ipsum dolor</span>
						<span>sed do eiusmod</span>
						<span>magna siad enim</span>
					</span>
                        <div class="kt-pricing-1__btn">
                            <button type="button" class="btn btn-danger btn-wide btn-uppercase btn-bolder btn-sm">Purchase</button>
                        </div>
                    </div>
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-warning"><i class="fa flaticon-gift"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">899<span class="kt-pricing-1__label">$</span></span>
                        <h2 class="kt-pricing-1__subtitle">Custom License</h2>
                        <span class="kt-pricing-1__description">
						<span>Lorem ipsum</span>
						<span>sed do eiusmod tem</span>
						<span>magna siad enim</span>
					</span>
                        <div class="kt-pricing-1__btn">
                            <button type="button" class="btn btn-warning btn-wide btn-uppercase btn-bolder btn-sm">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection