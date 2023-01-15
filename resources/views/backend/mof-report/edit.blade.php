@extends('backend.layouts.master')
@section('title', 'Edit MOF Report')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Weekly MOF Report</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('mof-report.index')}}">Weekly MOF Report</a>               
            </li>
            <li class="active">
                <strong>Edit</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            @include('backend.mof-report.template.edit-mof-report')
        </div>

    </div>
</div>

@endsection