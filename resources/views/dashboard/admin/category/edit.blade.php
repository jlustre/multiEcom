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
                            <form action="{{ url('admin/category/'.$category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('dashboard.admin.category.form')
                                <div class="d-flex justify-content-between mb-3">
                                    <div><label class="form-label mr-1">{{ __('Created At') }}: </label>{{ carbon\carbon::parse($category->created_at)->diffForHumans() }}</div>
                                    <div><label class="form-label mr-1">{{ __('Updated At') }}: </label>{{ carbon\carbon::parse($category->updated_at)->diffForHumans() }}</div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Update Category') }}</button>
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.category.index') }}">{{ __('Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
