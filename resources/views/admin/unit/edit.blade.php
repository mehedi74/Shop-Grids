@extends('admin.master')
@section('title')
    Update Unit
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
                <h4 class="card-title">Update Brand From</h4>
                <form class="form-horizontal p-t-20" action="{{route('units.update',$unit->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$unit->name}}" name="unit_name" class="form-control"
                                   id="exampleInputuname3" placeholder="Enter Category Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Unit Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="exampleInputuname3" name="unit_description"
                                      placeholder="Enter Category Description">{{$unit->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-7">
                            <label><input type="radio" name="unit_status" value="1" id="" {{$unit->status == 1 ? 'checked' : ''}}> Publish</label>
                            <label style="margin-left: 10px;"><input type="radio" name="unit_status" value="0"
                                                                     id="" {{$unit->status == 0 ? 'checked' : ''}}> Unpublish</label>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                Update Unit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


