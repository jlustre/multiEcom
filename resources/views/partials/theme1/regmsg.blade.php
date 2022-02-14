@if (Session::get('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
@else
    <p class="login-box-msg">{{ __('Register a new account') }}</p>
@endif