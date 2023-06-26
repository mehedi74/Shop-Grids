@extends('admin.master')
@section('title')
    All Products
@endsection
@section('body')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Products All Information</h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($product->product_status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-warning">Deactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Name</th>
                        <td width="50%">{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Model</th>
                        <td>{{$product->model}}</td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Subcategory</th>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$product->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Long Description</th>
                        <td>{{$product->long_description}}</td>
                    </tr>
                    <tr>
                        <th>Feature Image</th>
                        <td><a href="{{asset($product->feature_image)}}"><img src="{{asset($product->feature_image)}}" style="width: 100px;height: 100px;">View Images</a></td>
                    </tr>
                    <tr>
                        <th>Other Images</th>
                        <td>
                            @foreach($product->otherImages as $otherImage)
                                <img src="{{asset($otherImage->other_image)}}" style="width: 60px;height: 60px;">
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection


