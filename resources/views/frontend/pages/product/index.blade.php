@extends('frontend.layouts.master')

@section('content')
    @include('frontend.partials.slider')

    <!-- Start Sidebar + Content -->
    <div class='container margin-top-20'>
        <div class="row">
            <div class="col-md-3">
                <h4> Products Categories</h4>
                @include('frontend.partials.product-sidebar')

            </div>

            <div class="col-md-9">
                <div class="widget">
                    <h3> All Products sss</h3>
                    @include('frontend.pages.product.partials.all_products')
                </div>
                <div class="widget">

                </div>
            </div>


        </div>
    </div>

    <!-- End Sidebar + Content -->
@endsection
