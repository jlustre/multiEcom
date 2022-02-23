@extends('layouts.admin')

@section('header_title', 'View Menu')

@section('main_content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('VIEW MENU') }}</h5></div>
                        <div class="card-body">
                                @include('dashboard.admin.menu.form')
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3"><label for="id" class="form-label mr-2">Created At: </label>{{ carbon\carbon::parse($menu->created_at)->diffForHumans() }}</div>
                                    <div class="mb-3"><label for="id" class="form-label mr-2">Updated At: </label>{{ carbon\carbon::parse($menu->updated_at)->diffForHumans() }}</div>
                                </div>
                                <div class="d-flex justify-end">
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.menu.index') }}">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
