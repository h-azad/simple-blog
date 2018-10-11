@extends('layouts.master')

@section('contents')

@include('partials.header-post')

<!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!! $post->description !!}
          </div>
        </div>
      </div>
    </article>
@endsection
