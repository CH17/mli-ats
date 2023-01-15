@extends('backend.layouts.master')
@section('title', 'Edit JAC15 - Training')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit JAC15 - Training</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('jac15.index')}}">JAC15 - Training</a>
            </li>

            <li class="active">
                <strong>Edit JAC15 - Training</strong>
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
                    <h5>Edit JAC15 - Training</h5>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="ibox-content">
                            @if(\Session::has('success'))
                            <div class="alert alert-success">
                                <ul class="list-style-none">
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('jac15.update', $jac15->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12 @error('add_date') has-error @enderror">
                                        <label>Date Added</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                                type="text" class="form-control datepicker" name="add_date"
                                                value="{{$jac15->add_date}}">
                                        </div>
                                        @error('add_date')
                                        <div class="inline-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('year_quarter') has-error @enderror">
                                            <label for="year_quarter">Quarter</label>
                                            <input name="year_quarter" type="text" value="{{$jac15->year_quarter}}"
                                                class="form-control">
                                            @error('year_quarter')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('ipce_team') has-error @enderror">
                                            <label for="ipce_team">IPCE Team</label>
                                            <textarea type="text" name="ipce_team"
                                                class="form-control">{{$jac15->ipce_team}}</textarea>
                                            @error('ipce_team')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('cpd_need') has-error @enderror">
                                            <label for="cpd_need">CPD Needs Identified</label>
                                            <textarea type="text" name="cpd_need"
                                                class="form-control">{{$jac15->cpd_need}}</textarea>
                                            @error('cpd_need')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('learning_plan') has-error @enderror">
                                            <label for="learning_plan">Learning Plan</label>
                                            <textarea type="text" name="learning_plan"
                                                class="form-control">{{$jac15->learning_plan}}</textarea>
                                            @error('learning_plan')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('time_resources') has-error @enderror">
                                            <label for="time_resources">Time/Resources</label>
                                            <textarea type="text" name="time_resources"
                                                class="form-control">{{$jac15->time_resources}}</textarea>
                                            @error('time_resources')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @php
                                $int_ext = !empty($jac15->int_ext) ? explode(',', $jac15->int_ext) : [];                            
                                @endphp
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="Internal-External">Internal/External</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="form-check-input" type="checkbox" name="int_ext[]"
                                                        value="Internal" @if(!empty($int_ext) && in_array('Internal', $int_ext)) checked
                                                    @endif>
                                                    <label class="form-check-label" for="Internal">Internal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="form-check-input" type="checkbox" name="int_ext[]"
                                                        value="External" @if(!empty($int_ext) && in_array('External', $int_ext)) checked
                                                        @endif>
                                                    <label class="form-check-label" for="External">External</label>
                                                </div>
                                            </div>
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
                            @if(count($jac15s))
                            <table class="table table-striped table-bordered table-hover tooltip-suggestion">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Date Added</th>
                                        <th>Quarter</th>
                                        <th>IPCE Team</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="Jac15">
                                    @foreach($jac15s as $key=>$jac15)
                                    <tr class="gradeX">
                                        <td class="text-center">{!! ($key+1)+(15*($jac15s->currentPage()-1)) !!}</td>
                                        <td>{{$jac15->add_date}}</td>
                                        <td>{{$jac15->year_quarter}}</td>
                                        <td data-toggle="tooltip" data-placement="top" title="{{ $jac15->ipce_team }}">{{Str::words($jac15->ipce_team, 4,' ....') }}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('jac15.edit', $jac15->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$jac15->id}}" method="POST"
                                                action="{{ route('jac15.destroy', $jac15->id) }}" class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="deleteConfirmation('del-{{$jac15->id}}'); return false;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$jac15s->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No jac15 available</h4>
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
