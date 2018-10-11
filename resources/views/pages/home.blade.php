@extends('layouts.master')

@section('contents')

@include('partials.header')

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
      <div class="post-preview">
        <a href="{{ route('post_details',$post->id)}}">
          <h2 class="post-title">
            {{ $post->title }}
          </h2>
          <h3 class="post-subtitle">
            {{ $post->subtitle }}
          </h3>
        </a>
        <p class="post-meta">Posted
          <!-- by <a href="#">Start Bootstrap</a> -->
          on {{ date('M d, Y', strtotime($post->created_at)) }}</p>
      </div>
      <hr>
      @endforeach
      <!-- Pager -->
      @if(count($posts) > 10)
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
