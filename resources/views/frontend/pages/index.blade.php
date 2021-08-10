@extends('frontend.layouts.master')

@section('content')
    <!-- Start Sidebar + Content -->
    @include('frontend.partials.slider')

    <div class='container margin-top-20'>

        <div class="row">
            <div class="col-md-3">
                <h3> Products Categories</h3>


                @include('frontend.partials.product-sidebar')
            </div>

            <div class="col-md-9">
                <div class="widget">
                    <h3>All Products</h3>
                    @include('frontend.pages.product.partials.all_products')
                </div>
                <div class="widget">

                </div>
            </div>


        </div>
    </div>

    <!-- End Sidebar + Content -->
@endsection
