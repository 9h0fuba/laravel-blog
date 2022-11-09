@extends('layouts.main')

@section('container')
    <h1>Category</h1>
    
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
   
          <div class="col-12 col-md-4 my-2 px-2 d-flex flex-column justify-content-center">
            <div style="height: 200px;" class="bg-primary">
              <div class="bg-dark py-2 px-3 position-relative text-white text-center " style="background-color: rgba(0, 0, 0, 0.5); top:80px">  
                <a href="/categories/{{ $category->slug }}/posts">{{ $category->slug }}</a>
            </div>
            </div>

        </div>
        @endforeach
      </div>
      </div>

    @endsection
