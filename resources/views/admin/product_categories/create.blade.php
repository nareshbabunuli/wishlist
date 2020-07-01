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
                                <h3 class="card-title">Create Product Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('product_categories.store') }}"
                                  id="quickForm">
                                @csrf
                                <div class="card-body">
                                    <div class="card-footer">
                                        <h5>Basic Information</h5>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label for="category_name">Category</label>
                                            <input type="text" name="category_name" class="form-control"
                                                   id="category_name"
                                                   placeholder="Enter Category Name">
                                        </div>
                                    </div>
                                    <input type="text" name="admin_id" id="admin_id" class="form-control"
                                           value="{{Auth::guard('admin')->user()->id}}" readonly>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Product Category</button>
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
