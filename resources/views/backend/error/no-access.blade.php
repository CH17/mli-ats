@extends('backend.layouts.master')
@section('title', 'Projects')
@section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="middle-box text-center animated fadeInDown">
            <h3 class="font-bold">No Access</h3>
    
            <div class="error-desc">
                Sorry, but the page you are looking for has no permission to access.
                <br>
                <a href="{{route('dashboard')}}" class="btn btn-primary m-t">Dashboard</a>
            </div>
        </div>
    </div>
</div>
    
@endsection