@extends('master')
@section('content')
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-box-body">

     
     <div class="mb-3">
      <img style="display:block; margin-left: auto; margin-right: auto; height: 100px" src="{{ asset('images/uiu_logo.png') }}">
    </div>
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
       {{ $error }}
    </div>
    @endforeach
    <h2 class="login-box-msg">UIU CSS</h2>
    <form class="md-float-material form-material" action="{{ route('login') }}" method="POST">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" name="email" placeholder="email">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" name="password" placeholder="Password">
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember" >
            Remember Me </label>
            <a href="{{ route('password.request') }}" class="pull-right"><i class="fa fa-lock"></i> Forgot Password?</a> </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4 m-t-1">
            <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> LOGIN</button>
          </div>
          <!-- /.col --> 
        </div>
      </form>
    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
      Facebook</a> <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
      Google+</a> </div> -->
      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-box-body --> 
  </div>
  <!-- /.login-box --> 

  <!-- jQuery 3 --> 
  
</body>
@endsection