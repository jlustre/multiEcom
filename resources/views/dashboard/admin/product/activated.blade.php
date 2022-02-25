
<div class="card">
    <div class="card-header bg-secondary">
    <h3 class="card-title">{{ __('ACTIVE PRODUCTS') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>UnitPrice</th>
                <th>ABPoints</th>
                <th>InStock</th>
                <th>SKU</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->picture }}</td>
                <td><small>{{ $product->productName }}</small></td>
                <td>{{ $product->unitPrice }}</td>
                <td>{{ $product->ABPoints }}</td>
                <td>{{ $product->unitsInStock }}</td>
                <td>{{ $product->SKU }}</td>
                <td><small>{{ $product->description }}</small></td>
                <td class="d-flex align-items-end">
                    <a href="{{ url('admin/product/'.$product->id.'/edit')}}" class="btn btn-xs btn-info ml-1">Edit/View</a>
                    <a href="{{ url('admin/product/softdelete/'.$product->id) }}" class="btn btn-xs btn-warning ml-1">Deactivate</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
