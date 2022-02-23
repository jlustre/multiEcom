@extends('layouts.admin')

@section('header_title', 'Edit/View Menus')

@section('main_content')
    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('EDIT/VIEW MENU') }}</h5></div>
                        <div class="card-body">
                            <form action="{{ url('admin/menu/'.$menu->id) }}" method="POST">
                                @csrf
                                @method('put')

                                @include('dashboard.admin.menu.form')
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3"><label for="id" class="form-label mr-2">{{ __('Created At') }}: </label>{{ carbon\carbon::parse($menu->created_at)->diffForHumans() }}</div>
                                    <div class="mb-3"><label for="id" class="form-label mr-2">{{ __('Updated At') }}: </label>{{ carbon\carbon::parse($menu->updated_at)->diffForHumans() }}</div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Update Menu') }}</button>
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.menu.index') }}">{{ __('Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
