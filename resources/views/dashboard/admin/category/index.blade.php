@extends('layouts.admin')

@section('header_title', 'All Categories')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">

            <div class="col-md-8">
                @include('partials.theme1.common.main.message2')
                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-secondary">
                        <h5>{{ __('ACTIVE CATEGORIES') }}</h5>
                        <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($categories) }}</span></div>
                    </div>

                <table class="table">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created At</th> 
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <!-- <td scope="row">{{-- $categories->firstItem()+$loop->index --}}</td> -->
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ carbon\carbon::parse($category->created_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url('admin/category/edit/'.$category->id)}}" class="btn btn-xs btn-info">Edit/View</a>
                                <a href="{{ url('admin/category/softdelete/'.$category->id) }}" class="btn btn-xs btn-warning">Deactivate</a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                    <p> {{ $categories->links() }} </p>
                    </div>

                    <div class="card">
                    <div class="card-header d-flex justify-content-between bg-secondary">
                        <h5>{{ __('DEACTIVATED CATEGORIES') }}</h5>
                        <div class="mr-2">{{ __('Total') }}: <span class="badge rounded-pill bg-danger ml-2">{{ count($tcategories) - 1 }}</span></div>
                    </div>

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
                    </table>
                    {{ $tcategories->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('ADD NEW CATEGORY') }}</h5></div>
                        <div class="card-body">
                            <form action="{{ route('admin.store.category') }}" method="POST">
                                @csrf
                                @include('dashboard.admin.category.form')
                                
                                <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
