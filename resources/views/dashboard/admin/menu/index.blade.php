@extends('layouts.admin')

@section('header_title', 'All Menus')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('partials.theme1.common.main.message2')
                   
                    @if (count($menus) > 0)  
                         @include('dashboard.admin.menu.activated')
                    @else
                        <p>No Active Menu!</p>
                    @endif

                    @if (count($tmenus) > 0)  
                        @include('dashboard.admin.menu.deactivated')
                    @else
                        <p>No Deactivated Menu!</p>
                    @endif
                    
                    
                </div>
                
                <div class="col-md-4">
                    @include('dashboard.admin.menu.addForm')
                    @include('dashboard.admin.menu.tree')
                </div>
            </div>
        </div>
    </div>
@endsection
