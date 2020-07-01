@extends('layouts.home')
@section('banner_title','My Wishlist')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">

                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-wishlist-area pb-40 category-list">
                    <div class="row">
                    @foreach($wishlists as $wishlist)
                        <!-- single wishlist -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-wishlist">
                                    <img class="img-fluid"
                                         src="{{ URL::asset('product_images/'.\App\Products::find($wishlist->product_id)->image)}}"
                                         alt="">
                                    <div class="wishlist-details">
                                        <h6>{{\App\Products::find($wishlist->product_id)->name}}</h6>
                                        <br>
                                        <div class="prd-bottom">

                                            <form action="{{ route('wishlist.destroy', $wishlist->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"><span><i
                                                            class="fa fa-trash"></i></span></button>
                                            </form>
                                            <div class="pull-right" style="margin-top: -30px">
                                                <h4>$ {{\App\Products::find($wishlist->product_id)->price}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </section>
                <!-- End Best Seller -->

            </div>
        </div>
    </div>
@endsection
