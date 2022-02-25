@extends('layouts.admin')


@section('header_title', 'All Products')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.theme1.common.main.message2')
                   
                    @include('dashboard.admin.product.activated')

                    @include('dashboard.admin.product.addForm')

                    @include('dashboard.admin.product.deactivated')
                </div>
            </div>
        </div>
    </div>
@endsection
