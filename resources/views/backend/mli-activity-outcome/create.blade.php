@extends('backend.layouts.master')
@section('title', 'Add Mli Activity Outcome')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Mli Activity Outcome</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('moc-practices.index')}}">Mli Activity Outcome</a>
            </li>
            <li class="active">
                <strong>Add Mli Activity Outcome</strong>
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
<<<<<<< HEAD
                    <h5>Add Mli Activity Outcome </h5>
=======
                    <h5>Add Mli Activity Outcome</h5>
>>>>>>> 78ac22099b7de917347ca28ee856d1bc0c3f662d
                </div>
                <div class="ibox-content">
                    <form action="{{ route('moc-practices.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @error('moc_board_id') has-error @enderror"">
<<<<<<< HEAD
                                    <label for=" moc_board_id">Select Moc Board</label>
=======
                                    <label for="moc_board_id">Select Moc Board</label>
>>>>>>> 78ac22099b7de917347ca28ee856d1bc0c3f662d
                                    {!! Form::select('moc_board_id',$moc_boards , null, array('class' => 'form-control
                                    chosen-select','placeholder'=>'Select Moc Board') ); !!}
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
                                <div class="form-group @error('practice_areas') has-error @enderror">
                                    <label for="practice_areas">Practice Area</label>
                                    <input type="text" name="practice_areas" id="practice_areas"
                                        class="form-control @error('practice_areas') is-invalid @enderror">
                                    @error('practice_areas')
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