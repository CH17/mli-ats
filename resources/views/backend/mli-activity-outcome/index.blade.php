@extends('backend.layouts.master')
@section('title', 'Mli Activity Outcome')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Mli Activity Outcome</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>

            <li class="active">
                <strong>Mli Activity Outcome</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            @include('backend.mli-activity-outcome.template.mli-activity-outcomes-table')
        </div>

    </div>
</div>

@endsection