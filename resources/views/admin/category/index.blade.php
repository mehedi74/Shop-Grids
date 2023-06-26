@extends('admin.master')
@section('title')
    All Catergory
@endsection
@section('body')
    <div class="card">
        @if(Session::has('msg'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{session('msg')}}</strong>
            </div>
        @endif
        <div class="card-body">
            <h4 class="card-title">Category Table</h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->description}}</td>
                            <td><img style="width: 80px;height: 80px;" src="{{asset($category->image)}}"></td>
                            <td>
                                @if($category->status ==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-warning">Deactive</span>
                                @endif
                            </td>
                            <td width="20%">
                                @if($category->status == 1)
                                    <a href="{{route('categories.update.status',$category->id)}}" title="Deactive Status?" class="btn btn-danger"><i class="ti-thumb-down"></i></a>
                                @else
                                    <a href="{{route('categories.update.status',$category->id)}}" title="Active Status?" class="btn btn-success"><i class="ti-thumb-up"></i></a>
                                @endif
                               <a href="{{route('categories.edit',$category->id)}}" title="Edit?" class="btn btn-info"><i class="ti-pencil-alt"></i></a>
                                <form style="display: inline-block;" action="{{route('categories.destroy',$category->id)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button style="display: inline-block;" type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete?')"><i class="ti-trash"></i></button>
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
