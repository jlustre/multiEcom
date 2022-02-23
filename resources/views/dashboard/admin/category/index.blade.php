@extends('layouts.admin')

@section('header_title', 'All Categories')

@section('main_content')
   <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('partials.theme1.common.main.message2')
                    @if (count($categories) > 0)  
                        @include('dashboard.admin.category.activated')
                    @else
                        <p>No Active Category!</p>
                    @endif

                    @if (count($tcategories) > 1)  
                        @include('dashboard.admin.category.deactivated')
                    @else
                        <p>No Deactivated Category!</p>
                    @endif
                    
                </div>
                
                <div class="col-md-4">
                    @include('dashboard.admin.category.addForm')
                    @include('dashboard.admin.category.tree')
                </div>
            </div>
        </div>
    </div>
@endsection
