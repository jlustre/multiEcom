<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('DEACTIVATED CATEGORIES') }}</h5>
        {{-- <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($tcategories) - 1 }}</span></div> --}}
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
                            <td>{{ $tcategory->parent_id == 1 ? 'Root' : $tcategory->parent->category_name}}</td>
                            <td>{{ $tcategory->category_name }}</td>
                            <td>{{ carbon\carbon::parse($tcategory->deleted_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url('admin/category/'.$tcategory->id)}}" class="btn btn-xs btn-info">View</a>
                                <a href="{{ url('admin/category/restore/'.$tcategory->id) }}" class="btn btn-xs btn-success">Activate</a>
                                <form action="{{route('admin.category.destroy', $tcategory->id)}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button id="btnDelete" class="btn btn-xs btn-danger" 
                                    onclick="return confirm('Are you sure you want to DELETE\nthis category PERMANENTLY?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <p>{!! $tcategories->appends(Request::all())->links() !!} </p>
    </div> <!--  card-body -->
</div> <!--  card -->