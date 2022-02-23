@extends('layouts.admin')

@section('header_title', 'All Menus')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('partials.theme1.common.main.message2')
                    @include('dashboard.admin.menu.activated')
                    @include('dashboard.admin.menu.deactivated')
                    
                </div>
                
                <div class="col-md-4">
                    @include('dashboard.admin.menu.addForm')
                    @include('dashboard.admin.menu.tree')
                </div>
            </div>
        </div>
    </div>
@endsection
