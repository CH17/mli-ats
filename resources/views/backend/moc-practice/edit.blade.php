@extends('backend.layouts.master')
@section('title', 'Edit MOC Practice')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit MOC Credit Type</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('moc-practices.index')}}">MOC Practice</a>
            </li>
            <li class="active">
                <strong>Edit MOC Practice</strong>
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
                    <h5>Edit MOC Practice</h5>
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
                            <form action="{{ route('moc-practices.update', $moc_practice->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('moc_board_id') has-error @enderror"">
                                            <label for=" moc_board_id">Select MOC Board</label>
                                            {!! Form::select('moc_board_id',$moc_boards , $moc_practice->moc_board_id,
                                            array('class' =>
                                            'form-control
                                            chosen-select','placeholder'=>'Select MOC Board') ); !!}
                                            @error('moc_board_id')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  @error('order') has-error @enderror">
                                            <label for="order">Order</label>
                                            <input type="text" name="order" id="order"
                                                value="{{ $moc_practice->order }}"
                                                class="form-control @error('order') is-invalid @enderror">
                                            @error('order')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('practice_areas') has-error @enderror">
                                            <label for="credit_type">Practice Area</label>
                                            <input type="text" name="practice_areas" id="practice_areas"
                                                value="{{ $moc_practice->practice_areas }}"
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
                            @if(count($moc_practices))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>                                        
                                        <th>MOC Board</th>
                                        <th>Practice Area</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="MocPracticeEdit" moc_practice_id="{{ $moc_practice->id }}">
                                    @foreach($moc_practices as $key=>$moc_practice)
                                    <tr class="gradeX DrapRow" item_id="{{$moc_practice->id}}">
                                        <td class="text-center">{!! ($key+1)+(15*($moc_practices->currentPage()-1)) !!}
                                        </td>                                        
                                        <td>{{$moc_practice->moc_board->board}}</td>
                                        <td>{{$moc_practice->practice_areas}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('moc-practices.edit', $moc_practice->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$moc_practice->id}}" method="POST"
                                                action="{{ route('moc-practices.destroy', $moc_practice->id) }}"
                                                class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="deleteConfirmation('del-{{$moc_practice->id}}'); return false;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$moc_practices->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No MOC Practice Available</h4>
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