@extends('layouts.main')

@section('container')
<h1 class="text-center my-5">Register</h1>

 

   <div class="row d-flex justify-content-center">
    
    <div class="col-6 bg-light pt-5 pb-4 px-5">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
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
              <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
              @error('password') 
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary col-12">Register</button>
            <div class="text-center mt-3">
                <small>Registed? <a href=""> Login Now!</a></small> 
            </div>
     
          </form>
    </div>
   </div>


@endsection


