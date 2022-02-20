@extends('layouts.admin')

@section('header_title', 'All Users')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('partials.theme1.common.main.message2')
                    @include('dashboard.admin.user.activated')
                    @include('dashboard.admin.user.deactivated')
                </div>
                
                <div class="col-md-4">
                    @include('dashboard.admin.user.addForm')
                </div>
            </div>
        </div>
    </div>
@endsection
