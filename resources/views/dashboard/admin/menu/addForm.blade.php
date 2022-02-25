<div class="card">
    <div class="card-header bg-secondary">
        <h5>{{ __('ADD NEW MENU') }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.menu.store') }}" method="POST">
            @csrf
            <div class="mb-2">
                <div class="d-flex justify-content-start">
                    <label for="parent_id" class="form-label">{{ __('Parent Menu') }}</label>
                </div>
                <select name="parent_id" class="form-control" id="parent_id" value="{{ old('parent_id') }}">
                    <option value="">Select one</option>
                    <option value="1">Root Menu</option>
                    @foreach($allmenu as $mnu)
                        <option value="{{ $mnu['id'] }}">{{ $mnu['name'] }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="name" class="form-label">{{ __('Menu Name') }}</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="url" class="form-label">{{ __('Url') }}</label>
                <input type="text" name="url" class="form-control" id="url" value="{{ old('url') }}">
            </div>

            <div class="mb-2">
                <label for="routegroup" class="form-label">{{ __('Route Group') }}</label>
                <select name="routegroup" class="form-control" id="routegroup" value="{{ old('routegroup') }}">
                    <option value="">Select one</option>
                    <option value="brand" {{ (old('routegroup') == 'brand') ? 'selected' : '' }}>brand</option>
                    <option value="category" {{ (old('routegroup') == 'category') ? 'selected' : '' }}>category</option>
                    <option value="menu" {{ (old('routegroup') == 'menu') ? 'selected' : '' }}>menu</option>
                    <option value="product" {{ (old('routegroup') == 'product') ? 'selected' : '' }}>product</option>
                    <option value="user" {{ (old('routegroup') == 'user') ? 'selected' : '' }}>user</option>
                </select>
            </div>

            <div class="mb-2">
                <label for="iconclass" class="form-label">{{ __('Icon Class') }}</label>
                <input type="text" name="iconclass" class="form-control" id="iconclass" value="{{ old('iconclass') }}">
            </div>

            <div class="mb-2">
                <div class="d-flex justify-content-start">
                    <label for="isActive" class="form-label">{{ __('Is Active') }}</label>
                </div>
                <select name="isActive" class="form-control" id="isActive" value="{{ old('isActive') }}">
                    <option value="">Select one</option>
                    <option value="0" {{ (old('isActive') == 0) ? 'selected' : '' }}>False</option>
                    <option value="1" {{ (old('isActive') == 1) ? 'selected' : '' }}>True</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Add Menu</button>
        </form>
    </div> <!--  card-body -->
</div> <!--  card -->