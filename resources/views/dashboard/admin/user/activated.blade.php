
<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('ACTIVE USERS') }}</h5>
        {{-- <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($users) }}</span></div> --}}
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
                <th scope="col">Email</th>
                <!-- <th scope="col">Created At</th> -->
                <!-- <th scope="col">Status</th> -->
                <th scope="col" class="float-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <!-- <td scope="row">{{-- $users->firstItem()+$loop->index --}}</td> -->
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->sponsor }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- <td>{{-- carbon\carbon::parse($user->created_at)->diffForHumans() --}}</td> -->
                    <!-- <td>{{-- $user->activeUser->user_id --}}</td> -->
                    <td class="d-flex justify-content-end align-items-end">
                        <a href="{{ url('admin/user/'.$user->id.'/edit')}}" class="btn btn-xs btn-info">Edit/View</a>
                        <a href="{{ url('admin/user/softdelete/'.$user->id) }}" class="btn btn-xs btn-warning ml-1">Deactivate</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <p>{!! $users->appends(Request::all())->links() !!} </p>
    </div> <!--  card-body -->
</div> <!--  card -->