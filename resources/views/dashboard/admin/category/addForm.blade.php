<div class="card">
    <div class="card-header bg-secondary">
        <h5>{{ __('ADD NEW CATEGORY') }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.store.category') }}" method="POST">
            @csrf
            <div class="mb-2">
                <div class="d-flex justify-content-start">
                    <label for="parent_id" class="form-label">{{ __('Parent Category') }}</label>
                </div>
                <select name="parent_id" class="form-control" id="parent_id" value="{{ old('parent_id') }}">
                    <option value="">Select one</option>
                    <option value="1">Root Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="category_name" class="form-label">{{ __('Category Name') }}</label>
                <input type="text" name="category_name" class="form-control" id="category_name" value="{{ old('category_name') }}">
                @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
        </form>
    </div> <!--  card-body -->
</div> <!--  card -->