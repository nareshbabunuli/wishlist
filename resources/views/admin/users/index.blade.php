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
                <h3 class="card-title">Customers</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-sm-4">
                    <a href="{{ route('users.create')}}" class=" btn btn-primary">Add Customer</a>

                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1)
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$customer->name}}</td>
                            <td class="row">
                                <a href="{{ route('users.edit',$customer->id)}}"
                                   class="btn btn-primary"><span><i
                                            class="fa fa-edit"></i></span></a> &nbsp;
                                <form action="{{ route('users.destroy', $customer->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><span><i class="fa fa-trash"></i></span></button>
                                </form>
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <!-- /.card-body -->
        </div>

@endsection
