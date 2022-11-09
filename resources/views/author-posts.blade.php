@extends('layouts.main')

@section('container')
    <h1>Posts By Author </h1>

    @foreach ($userPosts as $userPost)
    <article class="mmt-3 py-3 border-bottom">
        <h5><a href="/posts/{{ $userPost->slug }}">{{ $userPost->title}}</a></h5>
       <p>Author by : {{ $userPost->user->name }} in Category : <a href="/categories/{{ $userPost->category->slug }}/posts"> {{ $userPost->category->slug }}</a></p>
        <p>{{ $userPost->excerpt }}</p>
        <a href="/posts/{{ $userPost->slug }}">Read more...</a>
    </article>
    @endforeach


@endsection