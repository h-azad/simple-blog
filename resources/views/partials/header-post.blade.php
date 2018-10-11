<header class="masthead" style="background-image: url('{{ asset('storage/'.$post->image) }}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{ $post->title }}</h1>
          <h2 class="subheading">{{ $post->subtitle }}</h2>
          <span class="meta">Posted
            on {{ date('M d, Y', strtotime($post->created_at)) }}</span>
        </div>
      </div>
    </div>
  </div>
</header>
