<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('ACTIVE CATEGORIES') }}</h5>
        {{-- <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($categories) }}</span></div> --}}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th> 
                    <th scope="col">Photo</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent</th>
                    <th scope="col">Created At</th> 
                    <th scope="col" class="float-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{ $categories->firstItem()+$loop->index  }}</td> 
                    <td>{{ $category->photo }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->parent_id == 1 ? 'Root' : $category->parent->category_name}}</td>
                    <td>{{ carbon\carbon::parse($category->created_at)->diffForHumans() }}</td>
                    <td class="d-flex justify-content-end align-items-end">
                        <a href="{{ url('admin/category/'.$category->id.'/edit')}}" class="btn btn-xs btn-info ml-1">Edit/View</a>
                        <a href="{{ url('admin/category/softdelete/'.$category->id) }}" class="btn btn-xs btn-warning ml-1">Deactivate</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <p>{!! $categories->appends(Request::all())->links() !!} </p>
    </div> <!--  card-body -->
</div> <!--  card -->