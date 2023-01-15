@extends('backend.layouts.master')
@section('title', 'Add Audience')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Audience</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('audience-types.index')}}">Audience</a>
            </li>
            <li class="active">
                <strong>Add Audience</strong>
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
                    <h5>Add Audience</h5>
                </div>
                
                <div class="ibox-content">
                    <form action="{{ route('audience-types.store') }}" method="POST">
                        @csrf

                        <div class="col-md-4">
                            <div class="form-group  @error('order') has-error @enderror">
                                <label for="order">Order</label>
                                <input type="text" name="order" id="order"
                                    class="form-control @error('order') is-invalid @enderror">
                                @error('order')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group @error('audience_type') has-error @enderror">
                                <label for="audience_type">Audience Type</label>
                                <input type="text" name="audience_type" id="audience_type"
                                    class="form-control @error('audience_type') is-invalid @enderror">
                                @error('audience_type')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name" class="display-block">&nbsp;</label>
                                <input type="submit" class="btn btn-primary" value="Add">
                            </div>
                        </div>

                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection