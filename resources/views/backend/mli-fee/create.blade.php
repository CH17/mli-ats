@extends('backend.layouts.master')
@section('title', 'Add MLI Fee')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add MLI Fee</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('mli-fees.index')}}">MLI Fee</a>
            </li>
            <li class="active">
                <strong>Add MLI Fee</strong>
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
                    <h5>Add MLI Fee</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('mli-fees.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group @error('activity_id') has-error @enderror"">
                                    <label for=" activity_id">Select Activity</label>
                                    {!! Form::select('activity_id',$projects , null, array('class' => 'form-control
                                    chosen-select','placeholder'=>'Select Activity') ); !!}
                                    @error('activity_id')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group  @error('accreditation_fee') has-error @enderror">
                                    <label for="accreditation_fee">Accreditation Fee ($)</label>
                                    <input type="text" name="accreditation_fee" id="accreditation_fee"
                                        class="form-control @error('accreditation_fee') is-invalid @enderror">
                                    @error('accreditation_fee')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="non_accreditation_revenue">Non Accreditation Revenue ($)</label>
                                    <input type="text" name="non_accreditation_revenue" id="non_accreditation_revenue"
                                        class="form-control">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="meeting_expense">Meeting Expense ($)</label>
                                    <input type="text" name="meeting_expense" id="meeting_expense" class="form-control">
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