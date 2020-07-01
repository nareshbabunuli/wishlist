@extends('layouts.auth')
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
                <h3 class="card-title">Wishlist</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1)
                    @foreach($wishlists as $wishlist)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{\App\Products::find($wishlist->product_id)->name}}</td>
                            <td><img width="100" height="100"
                                     src="{{ asset("uploads/".\App\Products::find($wishlist->product_id)->image) }}">
                            </td>
                            <td>
                                <div class="row">
                                    <a href="{{ route('wishlist.edit',$wishlist->id)}}"
                                       class="btn btn-primary"><span><i
                                                class="fa fa-edit"></i></span></a>
                                    <form action="{{ route('wishlist.destroy', $wishlist->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <p>Are you sure ?</p>
                                        <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-sm"><span><i
                                                    class="fa fa-trash"></i></span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <!-- /.card-body -->
        </div>

@endsection
