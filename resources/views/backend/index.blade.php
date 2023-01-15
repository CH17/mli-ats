@extends('backend.layouts.master')
@section('title', 'Dashboards')
@section('content')

<div class="dashboard-wrapper-content">
    
    @include('backend/dashboard/reports')
    
    <div class="row">  
        @include('backend/dashboard/ipce-report')
        @include('backend/dashboard/activity-load')  
    
    </div>  

    <div class="row">  
        @include('backend/dashboard/expired-activities')  
    </div> 

</div>
   
    
@endsection