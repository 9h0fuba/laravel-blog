@extends('layouts.main')

@section('container')
    <h1>Post by Category</h1>

  
    @foreach ($categoryPosts as $categoryPost)
    
    
    <article class="mt-3 py-3 border-bottom">
        <h5><a href="/posts/{{ $categoryPost->slug }}">{{ $categoryPost->title}}</a></h5>
       <p>Author by : <a href="/author/{{ $categoryPost->user->username }}">{{ $categoryPost->user->name }}</a> in Category : {{ $categoryPost->category->slug}}</p>
        <p>{{ $categoryPost->excerpt }}</p>
        <a href="/post">Read more...</a>
    </article> 
    @endforeach
   


@endsection