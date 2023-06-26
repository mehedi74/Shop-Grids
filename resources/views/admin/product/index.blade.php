@extends('admin.master')
@section('title')
    All Products
@endsection
@section('body')
    <div class="card">
        <div class="card-body">
            @if(Session::has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('msg')}}</strong>
                </div>
            @endif
            <h4 class="card-title">Products Table</h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock Amount</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->stock_amount}}</td>
                            <td><img src="{{asset($product->feature_image)}}" style="width: 50px;height: 50px;"></td>
                            <td>
                                @if($product->product_status == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-warning">Deactive</span>
                                @endif
                            </td>
                            <td width="20%">
                                @if($product->product_status == 1)
                                    <a href="{{route('product.update.status',$product->id)}}" title="Deactive Status?" class="btn btn-danger"><i class="ti-thumb-down"></i></a>
                                @else
                                    <a href="{{route('product.update.status',$product->id)}}" title="Active Status?" class="btn btn-success"><i class="ti-thumb-up"></i></a>
                                @endif
                                <a href="{{route('products.show',$product->id)}}" title="View Details?" class="btn btn-primary"><i class="ti-zoom-in"></i></a>
                                <a href="{{route('products.edit',$product->id)}}" title="Edit?" class="btn btn-info"><i class="ti-pencil-alt"></i></a>
                                <form style="display: inline-block;" action="{{route('products.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button style="display: inline-block;" type="submit" class="btn btn-danger" onclick="confirm( 'Are you sure to delete?')"><i class="ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

