@extends('backend.layouts.master')
@section('title', 'Add MOC Credit Type')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add MOC Credit Type</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('moc-credit-types.index')}}">MOC Credit Type</a>
            </li>
            <li class="active">
                <strong>Add MOC Credit Type</strong>
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
                    <h5>Add MOC Credit Type</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('moc-credit-types.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @error('moc_board_id') has-error @enderror"">
                                    <label for="moc_board_id">Select MOC Board</label>
                                    {!! Form::select('moc_board_id',$moc_boards , null, array('class' => 'form-control
                                    chosen-select','placeholder'=>'Select MOC Board') ); !!}
                                    @error('moc_board_id')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                                <div class="form-group @error('credit_type') has-error @enderror">
                                    <label for="credit_type">Credit Type</label>
                                    <input type="text" name="credit_type" id="credit_type"
                                        class="form-control @error('credit_type') is-invalid @enderror">
                                    @error('credit_type')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name" class="display-block">&nbsp;</label>
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>
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