<div class="mb-2">
    <div class="d-flex justify-content-between">
        <label for="parent_id" class="form-label">{{ __('Parent Menu') }}</label>
        <!-- <label for="id" class="form-label">ID: {{-- $menu->id --}}</label> -->
    </div>
    <select name="parent_id" class="form-control" id="parent_id" value="{{ $menu->parent_id }}">
        <option value="">Select one</option>
        <option value="1" {{ $menu->parent_id == 1 ? 'selected' : '' }}>Root Menu</option>
        @foreach($menus as $menuitem)
            <option value="{{ $menuitem->id }}" {{ $menu->parent_id == $menuitem->id ? 'selected' : '' }}>{{ $menuitem->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-2">
    <label for="name" class="form-label">{{ __('Menu Name') }}</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-2">
    <label for="url" class="form-label">{{ __('Url') }}</label>
    <input type="text" name="url" class="form-control" id="url" value="{{ $menu->url }}">
</div>

<div class="d-flex justify-content-between mb-3">
    <div>
        <label for="routegroup" class="form-label">{{ __('Route Group') }}</label>
        <select name="routegroup" class="form-control" id="routegroup" value="{{ $menu->routegroup }}">
            <option value="">Select one</option>
            <option value="user" {{ ($menu->routegroup == 'user') ? 'selected' : '' }}>user</option>
            <option value="category" {{ ($menu->routegroup == 'category') ? 'selected' : '' }}>category</option>
            <option value="menu" {{ ($menu->routegroup == 'menu') ? 'selected' : '' }}>menu</option>
            <option value="brand" {{ ($menu->routegroup == 'brand') ? 'selected' : '' }}>brand</option>
        </select>
    </div>

    <div>
        <label for="isActive" class="form-label">{{ __('Is Active') }}</label>
        <select name="isActive" class="form-control" id="isActive" value="{{ $menu->isActive }}">
            <option value="">Select one</option>
            <option value="0" {{ $menu->isActive == 0 ? 'selected' : '' }}>False</option>
            <option value="1" {{ $menu->isActive == 1 ? 'selected' : '' }}>True</option>
        </select>
    </div>

    <div>
        <label for="iconclass" class="form-label">{{ __('Icon Class') }}</label>
        <input type="text" name="iconclass" class="form-control" id="iconclass" value="{{ $menu->iconclass }}">
    </div>
</div>

