@extends('backend.layouts.master')
@section('title', 'Edit Credit Type')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Credit Type</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('credit-types.index')}}">Credit Types</a>
            </li>
            <li class="active">
                <strong>Edit Credit Type</strong>
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
                    <h5>Edit Credit Type</h5>
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
                            <form action="{{ route('credit-types.update', $creditType->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  @error('order') has-error @enderror">
                                            <label for="order">Order</label>
                                            <input type="text" name="order" id="order" value="{{$creditType->order}}"
                                                class="form-control @error('order') is-invalid @enderror">
                                            @error('order')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('credit_code') has-error @enderror">
                                            <label for="credit_code">Credit Code</label>
                                            <input type="text" name="credit_code" id="credit_code"
                                                value="{{$creditType->credit_code}}"
                                                class="form-control @error('credit_code') is-invalid @enderror">
                                            @error('credit_code')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('credit_name') has-error @enderror">
                                            <label for="credit_name">Credit Name</label>
                                            <input type="text" name="credit_name" id="credit_name"
                                                value="{{$creditType->credit_name}}"
                                                class="form-control @error('credit_name') is-invalid @enderror">
                                            @error('credit_name')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level">Label Text</label>
                                            <input type="text" name="level" id="level" value="{{$creditType->level}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>                                

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="criteria">Select Criteria(s)</label>
                                        <div class="form-group criteria">
                                            @php
                                            $criteria_array = null;
                                            if(!empty($creditType->criteria)){
                                            $criteria_array = json_decode($creditType->criteria);
                                            }
                                            @endphp
                                            @foreach ($criteria_list as $key => $criteria)
                                            <div class="checkbox checkbox-primary">
                                                <input class="form-check-input" type="checkbox" name="criteria[]"
                                                    value="{{$key}}" @if(!empty($criteria_array) &&
                                                    in_array($key,$criteria_array)) checked @endif>
                                                <label class="form-check-label" for="criteria">{{$key}} - {{$criteria}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group criteria">
                                            <label for="has_pharmacology_amount">Pharmacology Credit</label>
                                            <div class="checkbox checkbox-primary">
                                                <input class="form-check-input" type="checkbox"
                                                    id="has_pharmacology_amount" name="has_pharmacology_amount"
                                                    value="1" @if($creditType->has_pharmacology_amount==1) checked
                                                @endif>
                                                <label class="form-check-label"
                                                    for="has_pharmacology_amount">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="display-block">&nbsp;</label>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ibox-content">
                            @if(count($credit_types))
                            <table class="table table-striped table-bordered table-hover tooltip-suggestion">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Credit Code</th>
                                        <th>Audience Name</th>
                                        <th>Label Text</th>
                                        <th>Pharmacology Credit</th>
                                        <th>Criteria(s)</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="CreditTypeTableEdit" credit_type_id="{{ $creditType->id }}">
                                    @foreach($credit_types as $key=>$credit_type)
                                    @php
                                    $criteria_list = null;
                                    if(!empty($credit_type->criteria)){
                                    $criteria_list = json_decode($credit_type->criteria);
                                    $criteria_list = implode (", ", $criteria_list);
                                    }
                                    @endphp
                                    <tr class="gradeX DrapRow" item_id="{{$credit_type->id}}" data-toggle="tooltip"
                                        data-placement="left" title="Drag and drop to sort">
                                        <td class="text-center">{!! ($key+1)+(15*($credit_types->currentPage()-1)) !!}
                                        </td>
                                        <td>{{$credit_type->credit_code}}</td>
                                        <td>{{$credit_type->credit_name}}</td>
                                        <td>{{$credit_type->level}}</td>
                                        <td>@if($credit_type->has_pharmacology_amount==1) Yes @else No @endif</td>
                                        <td>{{$criteria_list}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('credit-types.edit', $credit_type->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form method="POST"
                                                action="{{ route('credit-types.destroy', $credit_type->id) }}"
                                                class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$credit_types->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No Credit Type Available</h4>
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