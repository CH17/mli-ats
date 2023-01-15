@extends('backend.layouts.master')
@section('title', 'Reports: JAC 13')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Reports: JAC 13 – Patient-Public</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li class="active">
                <strong>JAC 13 – Patient-Public</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            @include('backend.report.template.jac13')
        </div>

    </div>
</div>

@endsection