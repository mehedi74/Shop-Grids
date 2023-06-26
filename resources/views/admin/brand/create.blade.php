@extends('admin.master')
@section('title')
    Add  Brand
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
                <h4 class="card-title">Add Brand From</h4>
                <form class="form-horizontal p-t-20" action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="brand_name" class="form-control" id="exampleInputuname3" placeholder="Enter brand Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="exampleInputuname3" name="brand_description" placeholder="Enter brand Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Brand Image</label>
                        <div class="col-sm-5">
                            <h4 class="card-title">Upload Image</h4>
                            <input type="file" name="brand_image" id="input-file-now" class="dropify"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-7">
                            <label><input type="radio" name="brand_status" value="1" id="" checked> Publish</label>
                            <label style="margin-left: 10px;"><input type="radio" name="brand_status" value="0" id=""> Unpublish</label>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                Add Brand
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
