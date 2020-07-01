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
            <!-- /.card-header -->
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Product </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('products.store') }}"
                                  id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="card-footer">
                                        <h5>Basic Information</h5>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   id="name"
                                                   placeholder="Enter Product Name" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" class="form-control"
                                                   id="price"
                                                   placeholder="Enter Product Price" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="product_category">Product Category</label>
                                            <select name="product_category" class="form-control" id="product_category"
                                                    required>
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control" id="description">Enter Product description</textarea>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="image">Product Image</label>
                                            <input type="file" name="image" class="form-control"
                                                   id="image"
                                                   placeholder="Enter Product Image" required>
                                        </div>
                                        <input type="hidden" name="admin_id" id="admin_id" class="form-control"
                                               value="{{Auth::guard('admin')->user()->id}}" readonly>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- /.card-body -->
        </div>

@endsection
