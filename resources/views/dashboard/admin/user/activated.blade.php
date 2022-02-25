
<div class="card">
    <div class="card-header bg-secondary">
    <h3 class="card-title">{{ __('ACTIVE USERS') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Photo</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Sponsor</th>
                <th>Last Login</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                {{-- <td>{{ $users->firstItem()+$loop->index }}</td> --}}
                <td>{{ $user->profile_image_url }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td><small>{{ $user->email }}</small></td>
                <td>{{ $user->sponsor }}</td>
                <td><small>{{ carbon\carbon::parse($user->last_login)->diffForHumans() }}</small></td>
                <td class="d-flex align-items-end">
                    <a href="{{ url('admin/user/'.$user->id.'/edit')}}" class="btn btn-xs btn-info ml-1">Edit/View</a>
                    <a href="{{ url('admin/user/softdelete/'.$user->id) }}" class="btn btn-xs btn-warning ml-1">Deactivate</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
