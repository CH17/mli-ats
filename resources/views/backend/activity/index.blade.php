@extends('backend.layouts.master')
@section('title', 'Start Activity')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Start Activity</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>

            <li class="active">
                <strong>Start Activity</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<div class="wrapper wrapper-content">
    <div class="row">
        <form id="AddActivity" action="{{route('store.activity')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                @include('backend.activity.template.activity-form')
            </div>
            <div class="col-lg-4">                
                @include('backend.activity.template.assign-users')
                @include('backend.activity.template.notes')
            </div>
        </form>
    </div>
</div>

@endsection