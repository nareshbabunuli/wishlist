@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="card col-sm-12">
            <div class="card-header">
                <h3 class="card-title">Product</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-sm-4">
                    <a href="{{ route('products.create')}}" class=" btn btn-primary">Create Product</a>

                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Wished</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1)
                    @foreach($products as $product)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$product->name}}</td>
                            <td><img width="100" height="100" src="{{ asset("product_images/".$product->image) }}"></td>
                            <td>$ {{$product->price}}</td>
                            {{-- <td>{{count(\App\Wishlist::all()->where('product_id','=',$product->id))}} Users</td>--}}
                            @if(in_array($product->id,$myWish))
                                <td>
                                    <svg class="bi bi-heart-broke " width="2.5em" height="2.5em" viewBox="0 0 16 16"
                                         fill="#BD4F6C" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                    </svg>
                                </td>
                            @else
                                <td></td>
                            @endif

                            <td class="row">
                                <a href="{{ route('products.edit',$product->id)}}"
                                   class="btn btn-primary"><span><i
                                            class="fa fa-edit"></i></span></a> &nbsp;
                                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><span><i
                                                class="fa fa-trash"></i></span></button>
                                </form>
                                &nbsp;
                                @if(!(in_array($product->id,$myWish)))
                                    <a href="{{URL::to('admin/admin_wishlist/'.Auth::guard('admin')->user()->id.'/'.$product->id.'/')}}"
                                       class="btn btn-danger">
                                        <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                             fill="white" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{URL::to('admin/admin_wishlist/'.array_search($product->id,$myWish).'/')}}"
                                       class="btn btn-outline-primary">
                                        <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                             fill="#861657" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Wished</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <!-- /.card-body -->
        </div>

@endsection
