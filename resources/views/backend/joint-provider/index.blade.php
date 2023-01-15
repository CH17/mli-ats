@extends('backend.layouts.master')
@section('title', 'Joint Provider')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Joint Provider</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>

            <li class="active">
                <strong>Joint Provider</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            @include('backend.joint-provider.template.jp-list-table')
        </div>

    </div>
</div>

@endsection