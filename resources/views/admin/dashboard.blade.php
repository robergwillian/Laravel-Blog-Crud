@extends('layout')
@section('content')
            
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Todos Posts
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        {{-- <th>Thumb</th> --}}
                                        {{-- <th>Image</th> --}}
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        {{-- <th>Thumb</th> --}}
                                        {{-- <th>Image</th> --}}
                                        <th>Action</th>
                                      </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $post)
                                        <tr>
                                          <td>{{$post->id}}</td>
                                          <td>{{$post->title}}</td>
                                          <td>{{$post->cat_id}}</td>
                                          {{-- <td><img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width="100" /></td> --}}
                                          {{-- <td> --}}
                                            {{-- <td>{{$post->cat_id}}</td> --}}
                                            {{-- <td><img src="{{ asset('imgs').'/'.$post->image }}" width="100" /></td> --}}
                                            <td>
                                            <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection           