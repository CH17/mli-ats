@extends('backend.layouts.master')
@section('title', 'Resources')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Resources</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li class="active"><strong>Resources</strong></li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-title">
                    <div class="titleWrap">
                        <h5> {{ $page->title }}</h5>
                    </div>
                </div>
                <div class="ibox-content">                
                    <div class="m-t-md m-b-md m-l-md m-r-md">
                         {!! $page->content !!}
                    </div>      
                    
                    <a href="{{ route('resources.index') }}" class="m-t-md btn btn-info"> Back to Resource List</a>
                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>

@endsection