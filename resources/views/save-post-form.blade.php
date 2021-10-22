@extends('frontlayout')
@section('title','Save Post')
@section('content')

<div class="row">
    <div class="col-md-8">
        <h3>Add Post</h3>

        <div class="table-responsive">

            @if($errors)
              @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
              @endforeach
            @endif

            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif

            <form method="post" action="{{url('save-post-form')}}" enctype="multipart/form-data">
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
</div>


@endsection