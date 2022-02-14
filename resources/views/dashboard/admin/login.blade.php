@section('title', 'AsBeez Admin Signin')

@include('partials.theme1.header')

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('main') }}" class="h1"><b>AsBeez</b> {{ __('Admin') }}</a>
    </div>
    <div class="card-body">
      
      @include('partials.theme1.message')
      
      <form action="{{ route('admin.check') }}" method="POST" autocomplete="off">
        @csrf
        <small class="text-danger">@error('email') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('Enter your email') }}">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <small class="text-danger">@error('password') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input  id="password" name="password" type="password" class="form-control" placeholder="{{ __('Enter your password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
              <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">{{ __('Remember Me') }}</label>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">{{ __('Sign in') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1 d-flex justify-content-between">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        @endif
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@include('partials.theme1.scripts')
</body>
</html>
