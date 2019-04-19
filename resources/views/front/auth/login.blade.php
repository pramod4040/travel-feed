@extends('front.layouts.app')

@push('styles')
<style media="screen">
.arrange-button {
    position: relative;
    top: 14px;
    left: 83px;
    margin-top: -47px;
}
</style>
@endpush

@section('content')

    	<div class="container wrapper" style="padding-top:50px;padding-bottom:50px;">
        <div class="row">
        	<div class="col-sm-2">
            <div class="intro-texts">
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg">
                <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>
                <form name="Login_form" action="{{route('postLogin')}}" method="post" id='Login_form'>
                  {{csrf_field()}}
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>

                    <div class="row">
                      <input class="btn btn-primary" type="submit" name="" value="Login">
                    </div>
                  </div>
                  </form>
                  <div class="arrange-button">
                    <a href="{{route('customRegister')}}"><button class="btn btn-primary">Register</button></a>
                  </div>
                  <!--Login Form Ends-->
                  <!-- <p><a href="forgetpassword.html">Forgot Password?</a></p> -->
                  <!-- <button class="btn btn-primary">Login Now</button> <a href="register.html"><button class="btn btn-primary">Register</button></a> -->
          </div>
        </div>
      </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

@endsection
