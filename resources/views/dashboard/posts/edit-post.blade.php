@extends('layouts.mainDash')

@section('container')
    <h1>Edit Post</h1>
 
   

{{-- @if (session()->has('success'))
    {{ session('success') }}
@endif --}}

    <div class="row">
        <div class="col-8">
            <form action="{{ route('posts.update', $post) }}" method="POST">
              @method('put')
              @csrf
                <div class="mb-3">
                  <label for="title" class="form-label ">Title</label>
                  <input type="text" class="form-control @error('title') ? is-invalid  @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                  @error('title')
                 <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control  @error('slug') is-invalid @enderror " id="slug" name="slug" value="{{ old('slug', $post->slug) }}"> 
                  @error('slug')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label for="slug" class="form-label">Category</label>
                  @error('category_id') 
              <p class=" text-danger">{{ $message }}</p> 
                  @enderror
                  <select class="form-select" name="category_id" >
                  @foreach ($categories as $category)
                  @if (old('category_id',  $post->category_id) == $category->id )
                  <option value="{{ $category->id }}" selected> {{  $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}"> {{  $category->name }}</option>
                  @endif
                  @endforeach
                </select>
                </div>
                <div class="mb-3">
                  <label for="body" class="form-label">Slug</label>
                  @error('body')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input id="body" type="hidden" name="body" value="{{ old('body',  $post->body) }}">
                  <trix-editor input="body"   ></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>   
        </div>
    </div>

    <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function() {
        fetch(`/dashboard/posts/checkSlug?title=${title.value}`)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
      });



      document.addEventListener('trix-file-accept', (e) => e.preventDefault());

               
    </script>

@endsection