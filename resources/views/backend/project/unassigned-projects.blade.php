@extends('backend.layouts.master')
@section('title', 'Unassigned Activities')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Unassigned Activities</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li class="active">
                <strong>Unassigned Activities</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">           
            @include('backend.project.template.unassigned-project-lists-table')
        </div>
    </div>
</div>
    
@endsection