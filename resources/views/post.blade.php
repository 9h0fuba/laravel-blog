@extends('layouts.main')

@section('container')
   <div class="container-sm" >
    <h1>Single Post</h1>

   <img src="{{ $img->urls->regular }}" alt="" style="object-fit: cover; height: 400px; width:100%" >
    <article class="mt-3 py-3 border-bottom"> 
        <h5>{{ $post->title}}</h5>
        <p>{!! $post->body !!}</p>
    </article>
   </div>
   


@endsection