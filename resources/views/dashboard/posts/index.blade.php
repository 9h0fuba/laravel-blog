@extends('layouts.mainDash')

@section('container')
    <h1>Dashboard Post</h1>

    <div class="row d-flex justify-content-center">       
      <div class="col-7">        
         @if (session()->has('success'))         
         <div class="alert alert-success" role="alert">            
          {{ session('success') }}
      </div>
      @endif 
        </div> 
        </div>



    <a href="{{ route('posts.create') }}"><button class="btn btn-outline-secondary" type="button" ><h5>create posts</h5></button></a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">action</th>
          </tr>
        </thead>
   
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="/dashboard/posts/{{ $post->slug }}"><button class="btn btn-outline-secondary" type="button" >Detail</button></a>
                    
                    <a href="{{ route('posts.edit', $post) }}"><button class="btn btn-outline-secondary" type="button" >Edit</button></a>
                    

                    {{-- <form action="{{ route('posts.update', $post) }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-outline-secondary" type="submit" onclick="return confirm('Yakin Lu?')">Edit</button>
                     </form> --}}

                    <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-outline-secondary" type="submit" onclick="return confirm('Yakin Lu?')">Delete</button>
                     </form>

                </td>
              </tr>
              
              @endforeach
            </tbody>
      </table>
@endsection