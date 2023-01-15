@extends('backend.layouts.master')
@section('title', 'Users')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            
            <li class="active">
                <strong>Users</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
         
            @include('backend.user.template.user-lists-table')            

        </div>
            
    </div>
</div>
    
@endsection