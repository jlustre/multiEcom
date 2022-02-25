<div class="row">
    <div class="form-group col-9">
        <label for="productName">{{ __('Product Name') }}</label>
        <input type="text" id="productName" name="productName" class="form-control form-control-sm" placeholder="Product Name" value="{{ $product->productName }}">
        @error('productName')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-3">
        <label for="productName">{{ __('Product ID') }}</label>
        <input type="text" id="productID" name="productID" class="form-control form-control-sm" placeholder="Product ID" value="{{ $product->id }}" disabled>
        <input type="hidden" id="id" name="id" value="{{ $product->id }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-3">
        <label for="ABPoints">AB Points</label>
        <input type="text" id="ABPoints" name="ABPoints" class="form-control form-control-sm" placeholder="ABPoints" value="{{ $product->ABPoints }}">
    </div>
    <div class="form-group col-3">
        <label for="unitPrice">{{ __('Unit Price') }}</label>
        <input type="text" id="unitPrice" name="unitPrice" class="form-control form-control-sm" placeholder="Unit Price" value="{{ $product->unitPrice }}">
    </div>
    <div class="form-group col-3">
        <label for="unitsInStock">{{ __('Units In Stock') }}</label>
        <input type="text" id="unitsInStock" name="unitsInStock" class="form-control form-control-sm" placeholder="unitsInStock" value="{{ $product->unitsInStock }}">
    </div>
    <div class="form-group col-3">
        <label for="MSRP">MSRP</label>
        <input type="text" id="MSRP" name="MSRP" class="form-control form-control-sm" placeholder="MSRP" value="{{ $product->MSRP }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-3">
        <label for="quantityPerUnit">{{ __('Qty Per Unit') }}</label>
        <input type="text" id="quantityPerUnit" name="quantityPerUnit" class="form-control form-control-sm" placeholder="QtyPerUnit" value="{{ $product->quantityPerUnit }}">
    </div>
    <!-- select -->
    <div class="form-group col-3">
        <label>{{ __('Unit Size') }}</label>
        <select id="unitSize" name="unitSize" class="form-control form-control-sm" value="{{ $product->unitsize }}">
            <option value="">Select One</option>
            @foreach($unitsizes as $unitsize)
                <option value="{{ $unitsize->sname }}" {{ ($product->unitsize == $unitsize->sname) ? 'selected' : '' }}>{{ $unitsize->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-3">
        <label for="unitWeight">{{ __('Unit Weight') }}</label>
        <input type="text" id="unitWeight" name="unitWeight" class="form-control form-control-sm" placeholder="unitWeight" value="{{ $product->unitWeight }}">
    </div>
    <div class="form-group col-3">
        <label for="discount">{{ __('Discount') }}</label>
        <input type="text" id="discount" name="discount" class="form-control form-control-sm" placeholder="discount" value="{{ $product->discount }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-3">
        <label for="SKU">SKU</label>
        <input type="text" id="SKU" name="SKU" class="form-control form-control-sm" placeholder="SKU" value="{{ $product->SKU }}">
    </div>
    <div class="form-group col-3">
        <label for="supplierProduct_id">{{ __('Supplier ProdID') }}</label>
        <input type="text" id="supplierProduct_id" name="supplierProduct_id" class="form-control form-control-sm" placeholder="Supplier ProdID" value="{{ $product->supplierProduct_id }}">
    </div>
    
    <div class="form-group col-3">
        <label for="reOrderLevel">{{ __('Reorder Level') }}</label>
        <input type="text" id="reOrderLevel" name="reOrderLevel" class="form-control form-control-sm" placeholder="Reorder Lvl" value="{{ $product->reOrderLevel }}">
    </div>
    <div class="form-group col-3">
        <label for="unitsOnOrder">{{ __('Ordered Units') }}</label>
        <input type="text" id="unitsOnOrder" name="unitsOnOrder" class="form-control form-control-sm" placeholder="Ordered Units" value="{{ $product->unitsOnOrder }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="availableSizes">{{ __('Available Sizes') }}</label>
        <textarea name="availableSizes" id="availableSizes" class="form-control form-control-sm" rows="2" placeholder="Enter available sizes, separated with commas">{{ $product->availableSizes }}</textarea>
        @error('availableSizes')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="availablePackages">{{ __('Available Colors') }}</label>
        <textarea name="availableColors" id="availableColors" class="form-control form-control-sm" rows="2" placeholder="Enter available colors, separated with commas">{{ $product->availableColors }}</textarea>
        @error('availableColors')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="availableWeights">{{ __('Available Weights') }}</label>
        <textarea name="availableWeights" id="availableWeights" class="form-control form-control-sm" rows="2" placeholder="Enter available weights, separated with commas">{{ $product->availableWeights }}</textarea>
        @error('availableWeights')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="availablePackages">{{ __('Available Packaging') }}</label>
        <textarea name="availablePackages" id="availablePackages" class="form-control form-control-sm" rows="2" placeholder="Enter available packaging, separated with commas">{{ $product->availablePackages }}</textarea>
        @error('availablePackages')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="availableVolume">{{ __('Available Volume') }}</label>
        <textarea name="availableVolume" id="availableVolume" class="form-control form-control-sm" rows="2" placeholder="Enter available weights, separated with commas">{{ $product->availableVolume }}</textarea>
        @error('availableVolume')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="availableLength">{{ __('Available Lengths') }}</label>
        <textarea name="availableLength" id="availableLength" class="form-control form-control-sm" rows="2" placeholder="Enter available weights, separated with commas">{{ $product->availableLength }}</textarea>
        @error('availableLength')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-3">
        <label for="ranking">{{ __('Ranking') }}</label>
        <input type="text" id="ranking" name="ranking" class="form-control form-control-sm" placeholder="Ranking" value="{{ $product->ranking }}">
    </div>
    <div class="form-group col-3 mt-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="productAvailable" id="productAvailable" value="1" {{ $product->productAvailable ? 'checked' : '' }}>
            <label class="form-check-label">{{ __('Product Available') }}</label>
        </div>
    </div>
    <div class="form-group col-3 mt-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="discountAvailable" id="discountAvailable" value="1" {{ $product->discountAvailable ? 'checked' : '' }}>
            <label class="form-check-label">{{ __('Discount Available') }}</label>
        </div>
    </div>
    <div class="form-group col-3 mt-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="currentOrder" id="currentOrder" value="1" {{ $product->currentOrder ? 'checked' : '' }}>
            <label class="form-check-label">{{ __('Currently Ordered') }}</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-12">
        <label for="description">{{ __('Description') }}</label>
        <textarea name="description" id="description" class="form-control form-control-sm" rows="3" placeholder="Enter description ...">{{ $product->description }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="notes">{{ __('Notes') }}</label>
        <textarea name="notes" id="notes" class="form-control form-control-sm" rows="2" placeholder="Enter notes ...">{{ $product->notes }}</textarea>
        @error('notes')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>