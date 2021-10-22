@extends('frontlayout')
@section('title','All Categories')
@section('content')
                  {{-- @yield('content') --}}
                  @if ( !$categories->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="">
  @foreach( $categories as $category )
  <div class="list-group">
    <div class="list-group-item mb-3">
      <h3><a href="{{ url('category/'. Str::slug($category->title) . '/' .$category->id) }}">{{ $category->title }}</a>
      </h3>
      <p>{{ $category->created_at->format('M d,Y \a\t h:i a') }}</a></p>
    </div>
  </div>
  @endforeach
</div>
@endif
               </div>
              </div>
            </div>
          </div>
@endsection