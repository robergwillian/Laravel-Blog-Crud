@extends('frontlayout')
@section('title',$title)
@section('content')
                  {{-- @yield('content') --}}
                  @if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="">
  @foreach( $posts as $post )
  <div class="list-group">
    <div class="list-group-item mb-3">
      <h3><a href="{{ url('post/'. Str::slug($post->title) . '/' .$post->id) }}">{{ $post->title }}</a>
      </h3>
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }}</a></p>
    </div>
  </div>
  @endforeach
</div>
@endif

{{$posts->links()}}
            



                </div>
              </div>
            </div>
          </div>
@endsection