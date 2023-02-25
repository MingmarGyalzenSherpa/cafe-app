
@extends('frontend.adminPanel.layouts.main')

@section('container')
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>


  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          MAS. <br />
          <span style="color: hsl(218, 81%, 75%)">Login Panel</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Login Panel for our chefs and waiters.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
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
  <label class="form-label"  for="loginName">Email Address</label>
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
    </div>
  </div>
</section>


@endsection

//mandu