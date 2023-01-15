@extends('backend.layouts.master')
@section('title', 'Activity')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Activity</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li>
                <a href="{{route('projects.index')}}">Activities</a>                
            </li>
            <li class="active">
                <strong>Activity Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        
    </div>
</div>


<div class="wrapper wrapper-content">    
    <div class="row">
        <div class="col-lg-8">
            @include('backend.project.template.project-details')            
        </div>        
        <div class="col-lg-4">

            @include('backend.project.template.project-activities') 
            
            @include('backend.project.template.change-status')
            @if(!empty($user_role) && $user_role=='ADMIN')
            @include('backend.project.template.force-status-change')
            @endif            
        </div> 
    </div>  
</div>

@endsection