@extends('backend.layouts.master')
@section('title', 'Edit Audience')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Audience</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('audience-types.index')}}">Audience Types</a>
            </li>
            <li class="active">
                <strong>Edit Audience</strong>
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
                    <h5>Edit Audience</h5>
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
                            <form action="{{ route('audience-types.update', $audienceType->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  @error('order') has-error @enderror">
                                            <label for="order">Order</label>
                                            <input type="text" name="order" id="order" value="{{$audienceType->order}}"
                                                class="form-control  @error('order') is-invalid @enderror">
                                            @error('order')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('audience_type') has-error @enderror">
                                            <label for="audience_type">Audience Type</label>
                                            <input type="text" name="audience_type" id="audience_type"
                                                value="{{$audienceType->audience_type}}"
                                                class="form-control  @error('audience_type') is-invalid @enderror">
                                            @error('audience_type')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
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
                            @if(count($audiences))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Audience Type</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="AudienceTableEdit" audience_id="{{$audienceType->id}}">
                                    @foreach($audiences as $key=>$audience)
                                    <tr class="gradeX DrapRow" item_id="{{$audience->id}}">
                                        <td class="text-center">{!! ($key+1)+(15*($audiences->currentPage()-1)) !!}</td>
                                        <td>{{$audience->audience_type}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('audience-types.edit', $audience->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form method="POST"
                                                action="{{ route('audience-types.destroy', $audience->id) }}"
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
                                {{$audiences->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No Audience available</h4>
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