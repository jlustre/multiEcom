@if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@elseif (Session::get('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
@else
    <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>
@endif