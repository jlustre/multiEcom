@extends('layouts.admin')

@section('header_title', 'All Categories')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('partials.theme1.common.main.message2')
                    @include('dashboard.admin.category.activated')
                    @include('dashboard.admin.category.deactivated')
                </div>
                
                <div class="col-md-4">
                    @include('dashboard.admin.category.addForm')
                </div>
            </div>
        </div>
    </div>
@endsection
