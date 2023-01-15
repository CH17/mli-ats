@extends('backend.layouts.master')
@section('title', 'Add Credit Type')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Credit Type</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('credit-types.index')}}">Credit Type</a>
            </li>
            <li class="active">
                <strong>Add Credit Type</strong>
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
                    <h5>Add Credit Type</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('credit-types.store') }}" method="POST">
                        @csrf

                        <div class="col-md-2">
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
                            <div class="form-group @error('credit_code') has-error @enderror">
                                <label for="credit_code">Credit Code</label>
                                <input type="text" name="credit_code" id="credit_code"
                                    class="form-control @error('credit_code') is-invalid @enderror">
                                @error('credit_code')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group @error('credit_name') has-error @enderror">
                                <label for="credit_name">Credit Name</label>
                                <input type="text" name="credit_name" id="credit_name"
                                    class="form-control @error('credit_name') is-invalid @enderror">
                                @error('credit_name')
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