@extends('admin.master')
@section('title')
    Upadte Product
@endsection
@section('body')
    <div class="col-lg-12 mt-2">
        <div class="card">
            <div class="card-body">
                @if(Session::has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('msg')}}</strong>
                    </div>
                @endif
                <h4 class="card-title">Updatre Product From</h4>
                <form class="form-horizontal p-t-20" action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <div class="select">
                                <select name="cat_id" id="categoryId">
                                    <option selected disabled>Choose Category</option>
                                    @foreach($categories as $category)
                                        <option {{$product->category->name==$category->name ? "selected" : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Sub Category<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <div class="select">
                                <select name="subcat_id" id="subcatId">
                                    <option selected disabled>Choose Sub Category</option>
                                    @foreach($subCategories as $subCategory)
                                        <option {{$product->subCategory->name==$subCategory->name ? "selected" : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Brand<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <div class="select">
                                <select name="brand_id" id="format">
                                    <option selected disabled>Choose brand</option>
                                    @foreach($brands as $brand)
                                        <option {{$product->brand->name==$brand->name ? "selected" : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Unit<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <div class="select">
                                <select name="unit_id" id="format">
                                    <option selected disabled>Choose unit</option>
                                    @foreach($units as $unit)
                                        <option {{$product->unit->name==$unit->name ? "selected" : ''}} value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_name" class="col-sm-3 control-label"> Name<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="product_name" value="{{$product->name}}" class="form-control" id="product_name" placeholder="Enter product Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_code" class="col-sm-3 control-label"> Code<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="product_code" value="{{$product->code}}" class="form-control" id="product_code" placeholder="Enter product code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_model" class="col-sm-3 control-label"> Model<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" name="product_model" value="{{$product->model}}" class="form-control" id="product_model" placeholder="Enter product Model">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_stock_ammount" class="col-sm-3 control-label"> Stock Ammount<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="number" name="product_stock_ammount" value="{{$product->stock_amount}}" class="form-control" id="product_stock_ammount" placeholder="Enter product stock amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_regular_price" class="col-sm-3 control-label"> Product Price<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="number" name="product_regular_price" value="{{$product->regular_price}}"  class="form-control" id="product_regular_price" placeholder="Enter regular price">
                                <input type="number" name="product_selling_price" value="{{$product->selling_price}}" class="form-control" id="product_selling_price" placeholder="Enter selling price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="p_short_description" class="col-sm-3 control-label"> Short Description<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="p_short_description" name="p_short_description" placeholder="Enter product short description">{{$product->short_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="p_long_description" class="col-sm-3 control-label"> Long Description<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <textarea class="form-control summernote" id="p_long_description" name="p_long_description" placeholder="Enter product long description">{{$product->long_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Feature Image<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <h4 style="display: inline-block " class="card-title">Upload Image</h4>
                            <img src="{{asset($product->feature_image)}}" style="width: 80px;height: 80px">
                            <input type="file" name="product_feature_image" id="input-file-now" class="dropify"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web"> Other Images<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <h4 style="display: inline-block" class="card-title">Upload Images</h4>
                            @foreach($product->otherImages as $images)
                            <img src="{{asset($images->other_image)}}" style="width: 70px;height: 70px">
                            @endforeach
                            <input type="file" name="product_other_image[]" multiple id="input-file-now">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-7">
                            <label><input type="radio" name="product_status" value="1" id="" checked> Publish</label>
                            <label style="margin-left: 10px;"><input type="radio" name="product_status" value="0" id="">Unpublish</label>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                Update Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

