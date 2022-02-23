<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('DEACTIVATED MENUS') }}</h5>
        {{-- <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($tmenus) - 1 }}</span></div> --}}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">ID</th>
                <th scope="col">Parent</th>
                <th scope="col">Name</th>
                <th scope="col">Deactivated</th>
                <th scope="col" class="float-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tmenus as $tmenu)
                    @if ($tmenu->id !== 1)
                        <tr>
                            <!-- <th scope="row">{{-- $tmenus->firstItem()+$loop->index --}}</th> -->
                            <td>{{ $tmenu->id }}</td>
                            <td>{{ $tmenu->parent_id == 1 ? 'Root' : $tmenu->parent->name}}</td>
                            <td>{{ $tmenu->name }}</td>
                            <td><small>{{ carbon\carbon::parse($tmenu->deleted_at)->diffForHumans() }}</small></td>
                            <td class="d-flex justify-content-end align-items-end">
                                <a href="{{ url('admin/menu/'.$tmenu->id)}}" class="btn btn-xs btn-info ml-1">View</a>
                                <a href="{{ url('admin/menu/restore/'.$tmenu->id) }}" class="btn btn-xs btn-success ml-1">Activate</a>
                                <form action="{{ route('admin.menu.destroy', $tmenu->id) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button id="btnDelete" class="btn btn-xs btn-danger ml-1" 
                                    onclick="return confirm('Are you sure you want to DELETE\nthis menu PERMANENTLY?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <p>{!! $tmenus->appends(Request::all())->links() !!} </p>
    </div> <!--  card-body -->
</div> <!--  card -->