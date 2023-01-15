@extends('backend.layouts.master')
@section('title', 'Edit ILNA Code')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit ILNA Code</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('ilna-codes.index')}}">ILNA Codes</a>
            </li>
            <li class="active">
                <strong>Edit ILNA Code</strong>
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
                    <h5>Edit ILNA Code</h5>
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
                            <form action="{{route('ilna-codes.update', $ilna_code->id )}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  @error('order') has-error @enderror">
                                            <label for="order">Order</label>
                                            <input type="text" name="order" id="order" value="{{ $ilna_code->order }}"
                                                class="form-control @error('order') is-invalid @enderror">
                                            @error('order')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('subject_area') has-error @enderror">
                                            <label for="subject_area">MOC/CC subject_area</label>
                                            <input type="text" name="subject_area" id="subject_area" value="{{ $ilna_code->subject_area }}"
                                                class="form-control @error('subject_area') is-invalid @enderror">
                                            @error('subject_area')
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
                            @if( count($ilna_codes) )
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>                            
                                        <th>Subject Area</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="IlnaCodeTable">
                                    @foreach( $ilna_codes as $key => $ilna_code )

                                    <tr class="Row" item_id="{{$ilna_code->id}}">
                                        <td class="text-center">{!! ($key+1)+(15*($ilna_codes->currentPage()-1)) !!}</td>                         
                                        <td>{{$ilna_code->subject_area}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('ilna-codes.edit', $ilna_code->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$ilna_code->id}}" method="POST"
                                                action="{{ route('ilna-codes.destroy', $ilna_code->id) }}" class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"
                                                    onclick="deleteConfirmation('del-{{$ilna_code->id}}'); return false;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$ilna_codes->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No ILNA Code Available</h4>
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