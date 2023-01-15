@extends('backend.layouts.master')
@section('title', 'My Activities')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>My Activities</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li class="active">
                <strong>My Activities</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">           
            @include('backend.project.template.user-project-lists-table')
        </div>
    </div>
</div>
    
@endsection