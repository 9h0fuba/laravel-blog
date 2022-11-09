<div class="container">
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-12 col-md-4 my-2 px-2 ">
        <div style="height: 170px" class="bg-primary">
        <img src="{{ $img->urls->small }}" alt="" style="object-fit: cover; height: 170px;" >
          <div class="bg-dark py-2 px-3 position-absolute text-white" style="background-color: rgba(0, 0, 0, 0.5)">  <a class="text-white fs-6" href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a></div>
        </div>
        <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
       <h5><a href="{{ route('post',$post) }}">{{ $post->title}}</a></h5>
   
      <p>{{ $post->excerpt }}</p>
    </div>
    @endforeach
  </div>
  </div>
  