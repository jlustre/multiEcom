@extends('layouts.admin')

@section('header_title', 'View User')

@section('main_content')
    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('VIEW USER') }}</h5></div>
                        <div class="card-body">
                                @include('dashboard.admin.user.form')
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3"><label for="id" class="form-label ml-2">Created At: </label>{{ carbon\carbon::parse($user->created_at)->diffForHumans() }}</div>
                                    <div class="mb-3"><label for="id" class="form-label ml-2">Updated At: </label>{{ carbon\carbon::parse($user->updated_at)->diffForHumans() }}</div>
                                </div>
                                <div class="d-flex justify-end">
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.user.index') }}">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
