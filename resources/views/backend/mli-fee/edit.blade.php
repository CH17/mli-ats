@extends('backend.layouts.master')
@section('title', 'Edit MLI Fee')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit MLI Fee</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('mli-fees.index')}}">MLI Fee</a>
            </li>
            <li class="active">
                <strong>Edit MLI Fee</strong>
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
                    <h5>Edit MLI Fee</h5>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <ul class="list-style-none">
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="ibox-content">
                            <form action="{{ route('mli-fees.update', $mli_fee->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('activity_id') has-error @enderror"">
                                            <label for=" activity_id">Select Activity</label>
                                            {!! Form::select('activity_id',$projects , $mli_fee->activity_id,
                                            array('class' =>
                                            'form-control
                                            chosen-select','placeholder'=>'Select Activity') ); !!}
                                            @error('activity_id')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  @error('accreditation_fee') has-error @enderror">
                                            <label for="accreditation_fee">Accreditation Fee ($)</label>
                                            <input type="text" name="accreditation_fee" id="accreditation_fee"
                                                value="{{$mli_fee->accreditation_fee}}"
                                                class="form-control @error('accreditation_fee') is-invalid @enderror">
                                            @error('accreditation_fee')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="non_accreditation_revenue">Non Accreditation Revenue ($)</label>
                                            <input type="text" name="non_accreditation_revenue"
                                                id="non_accreditation_revenue"
                                                value="{{$mli_fee->non_accreditation_revenue}}" class="form-control">

                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="meeting_expense">Meeting Expense ($)</label>
                                            <input type="text" name="meeting_expense" id="meeting_expense"
                                                value="{{$mli_fee->meeting_expense}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="name" class="display-block">&nbsp;</label>
                                            <input type="submit" class="btn btn-primary" value="Update">
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ibox-content">

                            @if(count($mli_fees))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Activity ID</th>
                                        <th>Accreditation Fee ($)</th>
                                        <th>Non Accreditation Revenue ($)</th>
                                        <th>Meeting Expense ($)</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($mli_fees as $key=>$mli_fee)
                                    <tr class="gradeX">
                                        <td class="text-center">{!! ($key+1)+(15*($mli_fees->currentPage()-1)) !!}</td>
                                        <td>{{$mli_fee->project->activity_id}}</td>
                                        <td>{{$mli_fee->accreditation_fee}}</td>
                                        <td>{{$mli_fee->non_accreditation_revenue}}</td>
                                        <td>{{$mli_fee->meeting_expense}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('mli-fees.edit', $mli_fee->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$mli_fee->id}}" method="POST"
                                                action="{{ route('mli-fees.destroy', $mli_fee->id) }}"
                                                class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="deleteConfirmation('del-{{$mli_fee->id}}'); return false;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$mli_fees->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No MLI Fees Available</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection