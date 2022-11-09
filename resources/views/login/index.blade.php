@extends('layouts.main')

@section('container')
<h1 class="text-center my-5">Login</h1>

<div class="row d-flex justify-content-center">
<div class="col-7">
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
     {{ session('success') }}
   </div>
   @endif
</div>
</div>

<div class="row d-flex justify-content-center">
  <div class="col-7">
    @if (session()->has('loginError'))
    <div class="alert alert-danger" role="alert">
      {{ session('loginError') }}
     </div>
     @endif
  </div>
  </div>


<div class="row d-flex justify-content-center">
     
 
    
    <div class="col-6 bg-light pt-5 pb-4 px-5">
    
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="text" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary col-12">Login</button>
            <div class="text-center mt-3">
                <small>Not Registed? <a href=""> Register Now!</a></small> 
            </div>
     
          </form>
    </div>
   </div>


@endsection


