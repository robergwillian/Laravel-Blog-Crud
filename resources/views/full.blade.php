@extends('frontlayout')
@section('title',$post->title)
@section('content')

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="card">
              <div class="card-header"><h3>{{$post->title}}</h3></div>
              <div class="card-body">{{$post->content}}</div>
              <div class="card-footer">
                Created: {{$post->created_at}} | In <a href="{{url('category/'. Str::slug($post->category->title) . '/' . $post->category->id)}}">{{$post->category->title}}</a>
        </div>

        @auth
        <!-- add comment -->
        <div class="card mt-5 lg">
            <h5>Add Comment</h5>
            <div class="card-header">
                <div class="card-body">
                    <form method="post" action="{{url('save-comment/'. Str::slug($post->title) . '/' .$post->id)}}">
                    @csrf
                    <textarea name="comment" class="form-control"></textarea>
                    <input type="submit" class="btn btn-dark mt-3"/>
                </div>
            </div>
        </div>
        @endif
        <!-- FETCH COMMENTS -->
        <div class="card my-4">
            <h5 class="class-header ml-5">Comments <span class="badge bg-secondary">{{count($post->comments)}}</span></h5>
            <div class="card-body">
                @if($post->comments)
                    @foreach($post->comments as $comment)
                    <figure>
                        <blockquote class="blockquote">
                          <p>{{$comment->comment}}</p>  
                        </blockquote>

                        <figcaption class="blockquote-footer">
                          @if($comment->user_id == 0)
                          Created by: <cite title="Source Title">Admin</cite>
                          @else
                          Created by: <cite title="Source Title">{{$comment->user->name}}</cite>
                          @endif
                        </figcaption>
                      </figure>
                      <hr/>
                    @endforeach
                @endif
            </div>
        </div>


@endsection