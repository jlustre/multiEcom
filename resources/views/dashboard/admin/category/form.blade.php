<div class="mb-3">
    <div class="d-flex justify-content-between">
        <label for="parent_id" class="form-label">{{ __('Parent Category') }}</label>
        <label for="id" class="form-label">ID: {{ $category->id}}</label>
    </div>
    <select name="parent_id" class="form-control" id="parent_id" value="{{ $category->parent_id }}">
        <option value="">Select one</option>
        <option value="1" {{ $category->parent_id == 1 ? 'selected' : '' }}>Root Category</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
        @endforeach
    </select>
    @error('parent_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="category_name" class="form-label">{{ __('Category Name') }}</label>
    <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $category->category_name}}">
    @error('category_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>