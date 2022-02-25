<div class="card">
    <div class="card-header bg-secondary"><h5>{{ __('ADD NEW PRODUCT') }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.product.store') }}" method="POST" autocomplete="off">
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            @csrf
            <div class="mb-2">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="productName" class="form-control" id="productName" value="{{ old('productName') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



           
            
            <button type="submit" class="btn btn-sm btn-primary">Add Product</button>
        </form>
    </div>
</div>