@extends('admin.master')
@section('title')
    All Sub Catergory
@endsection
@section('body')
    <div class="card">
        <div class="card-body">
            @if(Session::has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('msg')}}</strong>
                </div>
            @endif
            <h4 class="card-title">Sub Category Table</h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Cat_Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subCategories as $key => $subCategory)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subCategory->name}}</td>
                            <td>{{$subCategory->id}}</td>
                            <td>{{$subCategory->description}}</td>
                            <td>{{$subCategory->category->name}}</td>
                            <td>
                                @if($subCategory->status ==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-warning">Deactive</span>
                                @endif
                            </td>
                            <td width="20%">
                                @if($subCategory->status == 1)
                                    <a href="{{route('subcat.status.update',$subCategory->id)}}" title="Deactive Status?" class="btn btn-danger"><i class="ti-thumb-down"></i></a>
                                @else
                                    <a href="{{route('subcat.status.update',$subCategory->id)}}" title="Active Status?" class="btn btn-success"><i class="ti-thumb-up"></i></a>
                                @endif
                                <a href="{{route('subcategories.edit',$subCategory->id)}}" title="Edit?" class="btn btn-info"><i class="ti-pencil-alt"></i></a>
                                <form style="display: inline-block;" action="{{route('subcategories.destroy',$subCategory->id)}}" method="post">
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

