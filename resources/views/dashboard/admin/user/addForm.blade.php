<div class="card">
    <div class="card-header bg-secondary"><h5>{{ __('ADD NEW USER') }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.user.store') }}" method="POST" autocomplete="off">
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            @csrf
            <div class="mb-2">
                <label for="name" class="form-label">Display Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="sponsor" class="form-label">Sponsor</label>
                <input type="text" name="sponsor" class="form-control" id="sponsor" value="{{ old('sponsor') }}">
                @error('sponsor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Add User</button>
        </form>
    </div>
</div>