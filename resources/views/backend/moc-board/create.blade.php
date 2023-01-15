@extends('backend.layouts.master')
@section('title', 'Add MOC Board')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add MOC Board</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('moc-boards.index')}}">MOC Board</a>
            </li>
            <li class="active">
                <strong>Add MOC Board</strong>
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
                    <h5>Add MOC Board</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('moc-boards.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group  @error('order') has-error @enderror">
                                    <label for="order">Order</label>
                                    <input type="text" name="order" id="order"
                                        class="form-control @error('order') is-invalid @enderror">
                                    @error('order')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('board') has-error @enderror">
                                    <label for="board">Board</label>
                                    <input type="text" name="board" id="board"
                                        class="form-control @error('board') is-invalid @enderror">
                                    @error('board')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('board_code') has-error @enderror">
                                    <label for="board_code">Board Code</label>
                                    <input type="text" name="board_code" id="board_code"
                                        class="form-control @error('board_code') is-invalid @enderror">
                                    @error('board_code')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('moc_code') has-error @enderror">
                                    <label for="moc_code">MOC Code</label>
                                    <input type="text" name="moc_code" id="moc_code" class="form-control">
                                    @error('moc_code')
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