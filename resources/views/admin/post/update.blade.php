
@extends('layout')
@section('title',$title)
@section('content')
<div class="container-fluid">


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Update Post
      <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-dark">All Posts</a>
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

        <form method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
              <tr>
                  <th>Titulo</th>
                  <td><input type="text" value="{{$data->title}}" name="title" class="form-control" /></td>
              </tr>
              <tr>
                  <th>Conteudo</th>
                  <td><input type="text" value="{{$data->content}}" name="content" class="form-control" /></td>
              </tr>
              <tr>
                <th>Categoria</th>
                <td>
                  <select class="form-control" name="cat_id">
                    @foreach($cats as $cat)
                      @if($cat->id == $data->cat_id)
                        <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                      @else 
                      <option value="{{$cat->id}}">{{$cat->title}}</option>
                      @endif
                    @endforeach
                  </td>
              </tr>
              {{-- <tr>
                  <th>Thumb</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs/thumb/')}}/{{$data->thumb}}" /></p>
                    <input type="hidden" value="{{$data->thumb}}" name="cat_img" />
                    <input type="file" name="thumb" />
                  </td>
              </tr> --}}
              {{-- <tr>
                  <th>Image</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs/')}}/{{$data->full_img}}" /></p>
                    <input type="hidden" value="{{$data->full_img}}" name="cat_img" />
                    <input type="file" name="full_img" />
                  </td>
              </tr> --}}
              <tr>
                <th>Tags</th>
                  <td><input type="text" value="{{$data->tags}}" name="tags" class="form-control" /></td>
              <tr>
                  <td colspan="2">
                      <input type="submit" class="btn btn-primary" />
                  </td>
              </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="card-footer small text-muted"></div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
