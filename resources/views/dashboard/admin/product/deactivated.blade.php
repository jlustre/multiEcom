 <div class="card">
    <div class="card-header bg-secondary">
        <h3 class="card-title">{{ __('DEACTIVATED PRODUCTS') }}</h3>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>UnitPrice</th>
                    <th>Deactivated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tproducts as $tproduct)
                    @if ($tproduct->id !== 1)
                        <tr>
                            <td>{{ $tproduct->picture }}</td>
                            <td>{{ $tproduct->productName }}</td>
                            <td>{{ $tproduct->unitPrice }}</td>
                            <td><small>{{ carbon\carbon::parse($tproduct->deleted_at)->diffForHumans() }}</small></td>
                            <td class="d-flex justify-content-end align-items-end">
                                    <a href="{{ url('admin/product/'.$tproduct->id)}}" class="btn btn-xs btn-info ml-1">View</a>
                                    <a href="{{ url('admin/product/restore/'.$tproduct->id) }}" class="btn btn-xs btn-success ml-1">Activate</a>
                                    <form action="{{ route('admin.product.destroy', $tproduct->id) }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <button id="btnDelete" class="btn btn-xs btn-danger ml-1" 
                                        onclick="return confirm('Are you sure you want to DELETE\nthis product PERMANENTLY?')">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{-- <p>{!! $tproducts->appends(Request::all())->links() !!} </p> --}}
    </div> <!--  card-body -->
</div> <!--  card -->