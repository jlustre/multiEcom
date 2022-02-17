@extends('layouts.admin')

@section('header_title', 'All Users')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">

            <div class="col-md-8">
                @include('partials.theme1.common.main.message2')
                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-secondary">
                        <h5>{{ __('ACTIVE USERS') }}</h5>
                        <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($users) }}</span></div>
                    </div>

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
                        <th scope="col">Action</th>
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
                            <td>
                                <a href="{{ url('admin/user/edit/'.$user->id)}}" class="btn btn-xs btn-info">Edit/View</a>
                                <a href="{{ url('admin/user/softdelete/'.$user->id) }}" class="btn btn-xs btn-warning">Deactivate</a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                    <p> {{ $users->links() }} </p>
                    </div>

                    <div class="card">
                    <div class="card-header d-flex justify-content-between bg-secondary">
                        <h5>{{ __('DEACTIVATED USERS') }}</h5>
                        <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($tusers)-1 }}</span></div>
                    </div>

                <table class="table">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sponsor</th>
                        <th scope="col">Username</th>
                        <th scope="col">Deactivated</th>
                        <th scope="col">Action</th>
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
                                    <td>{{ carbon\carbon::parse($tuser->deleted_at)->diffForHumans() }}</td>
                                    <td>
                                            <a href="{{ url('admin/user/view/'.$tuser->id)}}" class="btn btn-xs btn-info">View</a>
                                            <a href="{{ url('admin/user/restore/'.$tuser->id) }}" class="btn btn-xs btn-success">Activate</a>
                                            <a href="{{ url('admin/user/pdelete/'.$tuser->id) }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    {{ $tusers->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('ADD NEW USER') }}</h5></div>
                        <div class="card-body">
                            <form action="{{ route('admin.store.user') }}" method="POST" autocomplete="off">
                                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Display Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="sponsor" class="form-label">Sponsor</label>
                                    <input type="text" name="sponsor" class="form-control" id="sponsor" value="{{ old('sponsor') }}">
                                    @error('sponsor')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-sm btn-primary">Add User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
