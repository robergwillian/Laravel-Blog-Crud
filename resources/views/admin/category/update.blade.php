
@extends('layout')
@section('title',$title)
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Add Category
      <a href="{{url('admin/category')}}" class="float-right btn btn-sm btn-dark">All Categories</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        @if($errors)
          @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
          @endforeach
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif

        <form method="post" action="{{url('admin/category/'.$data->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
              <tr>
                  <th>Title</th>
                  <td><input type="text" value="{{$data->title}}" name="title" class="form-control" /></td>
              </tr>
              <tr>
                  <th>Description</th>
                  <td><input type="text" value="{{$data->description}}" name="description" class="form-control" /></td>
              </tr>
              {{-- <tr>
                  <th>Image</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs')}}/{{$data->image}}" /></p>
                    <input type="hidden" value="{{$data->image}}" name="cat_img" />
                    <input type="file" name="cat_img" />
                  </td>
              </tr> --}}
              <tr>
                  <td colspan="2">
                      <input type="submit" class="btn btn-primary" />
                  </td>
              </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
