@extends('layouts.home')
@section('banner_title','Make your wishlist')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    @foreach($product_categories as $product_category )
                        <ul class="main-categories">
                            <li class="main-nav-list active">
                                <a href="{{\Illuminate\Support\Facades\URL::to("product_category/".$product_category->id."/")}}">
                                    <span class="lnr lnr-arrow-right ">
                                    </span>{{ucwords($product_category->category_name)}}
                                    <span class="number"> ({{count(\App\Products::all()->where('product_category', '>=', $product_category->id))}})</span>
                                </a>
                            </li>
                        </ul>
                    @endforeach

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">

                    <div class="pagination-sm">
                        {{$products->render()}}
                    </div>

                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                    @foreach($products as $product)
                        <!-- single product -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid"
                                         src={{URL::asset("product_images/$product->image")}} alt="storage/{{$product->image}}">
                                    <div class="product-details">

                                        <h6>{{$product->name}}</h6>
                                        <br>
                                        <div class="prd-bottom ">
                                            @if(Auth::check())
                                                <a href="{{ URL::to("wishlist/".\Illuminate\Support\Facades\Auth::id()."/".$product->id."/")}}"
                                            @else
                                                <a href="#" onclick="check_login()"
                                                   @endif
                                                   class="social-info">
                                                    <span class="lnr lnr-heart"></span>
                                                    <p class="hover-text">Wishlist</p>
                                                </a>

                                                <div class="pull-right">
                                                    <h4>$ {{$product->price}}</h4>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination-sm">
                        {{$products->render()}}
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function check_login() {
            confirm("In order to create wishlist login first :)");
        }
    </script>

@endpush
