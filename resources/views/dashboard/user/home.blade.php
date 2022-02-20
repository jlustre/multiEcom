@extends('layouts.user')

@section('header_title', 'Member Dashboard')

@section('main_content')
   @include('partials.theme1.common.main.message2')
   @include('partials.theme1.user.stat_box')
@endsection
