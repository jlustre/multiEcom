@section('title', 'AsBeez Seller Registration')
@include('partials.theme1.common.top.header')

<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="{{ route('main') }}" class="h1"><b>AsBeez</b> {{ __('Seller') }}</a>
    </div>
    <div class="card-body">

      <form action="{{ route('seller.create') }}" method="post">
        @csrf

         @include('partials.theme1.common.main.regmsg')

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

        <small class="text-danger">@error('phone') {{ $message }} @enderror</small>
        <div class="input-group mb-3">
          <input type="phone" id="phone" name="phone" value="{{ old('phone') }}"class="form-control" placeholder="{{ __('Contact phone number') }}">
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
            <button type="submit" class="btn btn-success btn-block">{{ __('Sign Up') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('seller.login') }}" class="text-center">{{ __('I have A Seller Account') }}</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@include('partials.theme1.common.bottom.scripts')
</body>
</html>
