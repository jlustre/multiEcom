@extends('layouts.admin')

@section('header_title', 'Edit/View Product')

@section('main_content')
    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        @include('partials.theme1.common.main.message2')
                        <div class="card-header bg-secondary"><h5>{{ __('EDIT/VIEW PRODUCT') }}</h5></div>
                        <div class="card-body">
                            <form action="{{ url('admin/product/'.$product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('dashboard.admin.product.form')
                                <div class="d-flex justify-content-between">
                                    <small><label for="id" class="form-label mr-2">{{ __('Created') }}: </label>{{ carbon\carbon::parse($product->created_at)->diffForHumans() }}</small>
                                    <small><label for="id" class="form-label mr-2">{{ __('Updated') }}: </label>{{ carbon\carbon::parse($product->updated_at)->diffForHumans() }}</small>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Update Product') }}</button>
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.product.index') }}">{{ __('Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary"><h5>{{ __('UPDATE PASSWORD')}}</h5></div>
                        <div class="card-body">
                            <form action="{{ url('admin/product/updatepwd/'.$product->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Update Password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection
