@extends('backend.layouts.master')
@section('title', 'Educational Partner Contact')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Educational Partner Contact</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>

            <li class="active">
                <strong>Educational Partner Contact</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="titleWrap">
                        <h5>Educational Partner Contacts</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @include('backend.ep-contact.add')
                    </div>
                    <div class="col-md-9">
                        @include('backend.ep-contact.template.ep-contact-list-table')
                    </div>

                </div>
            </div>


        </div>

    </div>
</div>

@endsection