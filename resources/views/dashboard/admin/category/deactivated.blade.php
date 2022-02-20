<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('DEACTIVATED CATEGORIES') }}</h5>
        <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($tcategories) - 1 }}</span></div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">ID</th>
                <th scope="col">Parent</th>
                <th scope="col">Category Name</th>
                <th scope="col">Deactivated</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tcategories as $tcategory)
                    @if ($tcategory->id !== 1)
                        <tr>
                            <!-- <th scope="row">{{-- $tcategories->firstItem()+$loop->index --}}</th> -->
                            <td>{{ $tcategory->id }}</td>
                            <td>{{ $tcategory->parent_id }}</td>
                            <td>{{ $tcategory->category_name }}</td>
                            <td>{{ carbon\carbon::parse($tcategory->deleted_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url('admin/category/view/'.$tcategory->id)}}" class="btn btn-xs btn-info">View</a>
                                <a href="{{ url('admin/category/restore/'.$tcategory->id) }}" class="btn btn-xs btn-success">Activate</a>
                                <a href="{{ url('admin/category/pdelete/'.$tcategory->id) }}" class="btn btn-xs btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $tcategories->links() }}
    </div> <!--  card-body -->
</div> <!--  card -->