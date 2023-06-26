@extends('admin.master')
@section('title')
    Update Sub Category
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
                <h4 class="card-title">Update Sub Category From</h4>
                <form class="form-horizontal p-t-20" action="{{route('subcategories.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Sub Category Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="subcategory_name" value="{{$subcategory->name}}" class="form-control" id="exampleInputuname3" placeholder="Enter sub category Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Select Category</label>
                        <div class="col-sm-7">
                            <div class="select">
                                <select name="cat_id" id="format">
                                    <option disabled>Choose Category</option>
                                    @foreach($categories as $category)
                                        <option  {{$subcategory->category->name == $category->name  ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Description</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="exampleInputuname3" name="subcategory_description" placeholder="Enter sub category Description">{{$subcategory->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-7">
                            <label><input type="radio" name="subcategory_status" value="1" id="" {{$subcategory->status == 1 ? 'checked': ''}}> Publish</label>
                            <label style="margin-left: 10px;"><input type="radio" name="subcategory_status" value="0" id="" {{$subcategory->status == 0 ? 'checked': ''}}> Unpublish</label>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                Update Sub Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

