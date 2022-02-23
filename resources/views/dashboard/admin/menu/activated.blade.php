<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('ACTIVE MENUS') }}</h5>
        {{-- <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($menus) }}</span></div> --}}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">ID</th>
                <th scope="col">Parent</th>
                <th scope="col">Menu Name</th>
                <th scope="col">Created At</th> 
                <th scope="col" class="float-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <!-- <td scope="row">{{-- $menus->firstItem()+$loop->index --}}</td> -->
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->parent_id == 1 ? 'Root' : $menu->parent->name}}</td>
                    <td>{{ $menu->name }}</td>
                    <td><small>{{ Carbon\carbon::parse($menu->created_at)->diffForHumans() }}</small></td>
                    <td class="d-flex justify-content-end align-items-end">
                        <a href="{{ url('admin/menu/'.$menu->id.'/edit')}}" class="btn btn-xs btn-info ml-1">Edit/View</a>
                        <a href="{{ url('admin/menu/softdelete/'.$menu->id) }}" class="btn btn-xs btn-warning ml-1">Deactivate</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <p>{!! $menus->appends(Request::all())->links() !!} </p>
    </div> <!--  card-body -->
</div> <!--  card -->