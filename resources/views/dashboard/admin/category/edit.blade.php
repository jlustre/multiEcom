@extends('layouts.admin')

@section('header_title', 'Edit/View Categories')

@section('main_content')
    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('EDIT/VIEW CATEGORY') }}</h5></div>
                        <div class="card-body">
                            <form action="{{ url('admin/category/update/'.$category->id) }}" method="POST">
                                @csrf
                                @include('dashboard.admin.category.form')
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3"><label for="id" class="form-label mr-2">{{ __('Created At') }}: </label>{{ carbon\carbon::parse($category->created_at)->diffForHumans() }}</div>
                                    <div class="mb-3"><label for="id" class="form-label mr-2">{{ __('Updated At') }}: </label>{{ carbon\carbon::parse($category->updated_at)->diffForHumans() }}</div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Update Category') }}</button>
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.all.category') }}">{{ __('Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
