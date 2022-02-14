@section('title', 'AsBeez Admin Registration')
@include('partials.theme1.header')

<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="{{ route('main') }}" class="h1"><b>AsBeez</b> {{ __('Admin') }}</a>
    </div>
    <div class="card-body">

      <form action="{{ route('admin.create') }}" method="post" autocomplete="off">
        @csrf

        @include('partials.theme1.regmsg')

        <small class="text-danger">@error('name') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Display name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <small class="text-danger">@error('email') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" value="{{ old('email') }}"class="form-control" placeholder="{{ __('Email Address') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <small class="text-danger">@error('password') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <small class="text-danger">@error('password_confirmation') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="{{ __('Retype password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <small class="text-danger">@error('terms') {{ $message }} @enderror</small>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="terms" name="terms" value="1" {{ old('terms') ? ' checked' : '' }}>
              <label for="terms">
               {{__('I agree to the')}} <a href="#">{{ __('terms') }}</a>
              </label>
            </div>
          </div>
          <!-- /.col -->

          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">{{ __('Sign Up') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('admin.login') }}" class="text-center">{{ __('Already an admin, signin') }}</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@include('partials.theme1.scripts')
</body>
</html>
