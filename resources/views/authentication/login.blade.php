
@extends('frontend.adminPanel.order.layouts.main')

@section('container')
<div class="container w-25 border p-4" style="margin-top:90px;">

  {{-- <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    {{-- <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li> 
  </ul> --}}
  
  <h2>LOGIN</h2>
  
  <div class="tab-content pt-2">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form action="{{route('submitLogin')}}" method="POST">

        @csrf
       @if(Session::has('failed'))

          <div class="alert alert-danger">{{Session::get('failed')}}</div>
       @endif

        <!-- Email input -->
        <div class="form-outline mb-4">
          @error('email')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <input type="email" id="loginName" name="email" class="form-control" value="{{old('email')}}" />
          <label class="form-label"  for="loginName">Email</label>
        </div>
  
        <!-- Password input -->
        <div class="form-outline mb-4">
          @error('password')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <input type="password" id="loginPassword" name="password"  class="form-control" />
          <label class="form-label" for="loginPassword">Password</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      </form>
    </div>
  </div>
</div>

@endsection