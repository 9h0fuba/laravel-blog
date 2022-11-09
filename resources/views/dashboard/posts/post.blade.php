@extends('layouts.mainDash')

@section('container')
    <h1>Single Post</h1>


       <div style="width: 100%" class="text-center">
        <img style="object-fit: cover; height:400px;" src="{{ asset("storage/$post->image") }}" alt="">
       </div>

    <article  class="mt-3 py-3 " style="width: 80%"> 
        
        <p>Author by : <a href="">{{ $post->user->name }}</a> in Category : <a href=""> {{ $post->category->name}}</a></p>
        <h5>{{ $post->title}}</h5>
     <p>  {!! $post->body !!}</p>
    </article>
   
@endsection