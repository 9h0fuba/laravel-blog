

@extends('layouts.main')

@section('container')
{{-- hero --}}
   <div class="row">

    {{-- left hero --}}
    <div class="col-md-6 col-12 mb-3">
      {{-- <img src="{{ $img->urls->regular }}" alt="" style="object-fit: cover; height: 400px; width:100%" > --}}
      <p class="card-text"><small class="text-muted">{{ $post[0]->created_at->diffForHumans() }}</small></p>
      <h5 class="card-title">{{ $post[0]->title }}</h5>
      <p class="card-text">{{ $post[0]->excerpt  }}</p>
    </div>
    {{-- end left hero --}}

{{-- right hero--}}
    <div class="col-md-6 col-12 ">
      {{-- right item --}}
      <div class="row">
        <div class="col-md-12 ">
          <div class="row ">
            @foreach ($post->skip(1) as $p)
            <div class="col-md-5 col-12 mb-3">
              {{-- <img src="{{ $img->urls->small }}" alt="" style="object-fit: cover; height: 145px; width:100%" > --}}
            </div>
            <div class="col-md-7 col-12 mb-3">
              <p class="card-text"><small class="text-muted">{{ $p->created_at->diffForHumans() }}</small></p>
              <h5 class="card-title">{{ $p->title }}</h5>
            </div>
            @endforeach
         </div>
        </div>
      </div>
{{-- right item --}}
    </div>
{{-- end right-hero --}}
 </div>

{{-- end hero --}}

    <div style="width:100%; height: 0.1rem; " class="mt-3 bg-dark"></div>

    @if (request('author'))
    <h3 class="text-left my-3">Posts By Author : {{ request('author') }}</h3>
    @elseif (request('category'))
    <h3 class="text-left my-3">Posts By Category : {{ request('category') }}</h3>
    @else
    <h3 class="text-left my-3">New Article</h3>
    @endif

{{-- seacrh bar --}}
    <div class="col-12 col-sm-6 text-left">
      <form action="{{ route('posts') }}">
        <div class="input-group mb-3">
         @if (request('category'))
         <input type="hidden" name="category" value="{{ request('category') }}">
         @endif
         @if (request('author'))
         <input type="hidden" name="author" value="{{ request('author') }}">
         @endif
         {{-- <input type="hidden" name="category" value="{{ request('category') }}"> --}}
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ old('search') }}">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Seacrh</button>
        </div>
      </form>
     </div>
{{-- end search bar --}}

      {{-- card --}}
          @include('partials.card')
        {{-- end-card --}}

    {{-- pagination --}}
     <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>
    {{-- end pagination --}}

@endsection