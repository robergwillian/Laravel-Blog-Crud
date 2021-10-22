@extends('layout')
@section('title',$title)
@section('content')
        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Add Post
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

                <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                      <tr>
                          <th>Titulo <span class="text-danger">*</span></th>
                          <td><input type="text" name="title" class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Conteudo <span class="text-danger">*</span></th>
                          <td><textarea name="content" class="form-control" rows="5" cols="33" ></textarea></td>
                      </tr>
                      <tr>
                        <th>Tags</th>
                        <td><textarea name="tags" class="form-control"></textarea></td>
                    </tr>
                      <tr>
                          <th>Thumbnail</th>
                          <td><input type="file" name="thumb" /></td>
                      </tr>
                      <tr>
                        <th>Full Image</th>
                        <td><input type="file" name="full_img" /></td>
                    </tr>
                      <tr>
                      <tr>
                          <th>Categoria <span class="text-danger">*</span></th>
                          <td>
                            <select class="form-control" name="category">
                              @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                              @endforeach
                            </select>
                          </td>
                      </tr>
                          <td colspan="2">
                              <input type="submit" class="btn btn-primary" />
                          </td>
                      </tr>
                  </table>
                </form>
              </div>
            </div>
            <div class="card-footer small text-muted">...</div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
