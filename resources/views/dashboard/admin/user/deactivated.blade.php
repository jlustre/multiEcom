 <div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('DEACTIVATED USERS') }}</h5>
        {{-- <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($tusers)-1 }}</span></div> --}}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Sponsor</th>
                <th scope="col">Username</th>
                <th scope="col">Deactivated</th>
                <th scope="col" class="float-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tusers as $tuser)
                    @if ($tuser->id !== 1)
                        <tr>
                            <!-- <th scope="row">{{-- $tusers->firstItem()+$loop->index --}}</th> -->
                            <td>{{ $tuser->id }}</td>
                            <td>{{ $tuser->name }}</td>
                            <td>{{ $tuser->sponsor }}</td>
                            <td>{{ $tuser->username }}</td>
                            <td><small>{{ carbon\carbon::parse($tuser->deleted_at)->diffForHumans() }}</small></td>
                            <td class="d-flex justify-content-end align-items-end">
                                    <a href="{{ url('admin/user/'.$tuser->id)}}" class="btn btn-xs btn-info ml-1">View</a>
                                    <a href="{{ url('admin/user/restore/'.$tuser->id) }}" class="btn btn-xs btn-success ml-1">Activate</a>
                                    <form action="{{ route('admin.user.destroy', $tuser->id) }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <button id="btnDelete" class="btn btn-xs btn-danger ml-1" 
                                        onclick="return confirm('Are you sure you want to DELETE\nthis user PERMANENTLY?')">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <p>{!! $tusers->appends(Request::all())->links() !!} </p>
    </div> <!--  card-body -->
</div> <!--  card -->