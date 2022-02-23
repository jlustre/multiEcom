<div class="d-flex justify-content-between mb-3">
    <div>
        <label for="sponsor" class="form-label">{{ __('Sponsor') }}</label>
        <input type="text" name="sponsor" class="form-control" id="sponsor" value="{{ $user->sponsor}}">
        @error('sponsor')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="username" class="form-label">{{ __('Username') }}</label>
        <input type="text" name="username" class="form-control" id="username" value="{{ $user->username}}">
        @error('username')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <div class="d-flex justify-content-between">
        <label for="name" class="form-label">{{ __('Display Name') }}</label>
        <label for="id" class="form-label">ID: {{ $user->id}}</label>
    </div>
    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">{{ __('Email Address') }}</label>
    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email}}">
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>