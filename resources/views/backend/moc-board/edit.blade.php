@extends('backend.layouts.master')
@section('title', 'Edit MOC Board')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit MOC/CC Board</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('moc-boards.index')}}">MOC Board</a>
            </li>
            <li class="active">
                <strong>Edit MOC/CC Board</strong>
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
                    <h5>Edit MOC/CC Board</h5>
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
                            <form action="{{ route('moc-boards.update', $moc_board->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  @error('order') has-error @enderror">
                                            <label for="order">Order</label>
                                            <input type="text" name="order" id="order" value="{{ $moc_board->order }}"
                                                class="form-control @error('order') is-invalid @enderror">
                                            @error('order')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('board') has-error @enderror">
                                            <label for="board">MOC/CC Board</label>
                                            <input type="text" name="board" id="board" value="{{ $moc_board->board }}"
                                                class="form-control @error('board') is-invalid @enderror">
                                            @error('board')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('board_code') has-error @enderror">
                                            <label for="board_code">Board Code</label>
                                            <input type="text" name="board_code" id="board_code"
                                                value="{{ $moc_board->board_code }}"
                                                class="form-control @error('board_code') is-invalid @enderror">
                                            @error('board_code')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('moc_code') has-error @enderror">
                                            <label for="moc_code">MOC Code</label>
                                            <input type="text" name="moc_code" id="moc_code"
                                                value="{{ $moc_board->moc_code }}" class="form-control">
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
                            @if(count($moc_boards))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>                                        
                                        <th>Board</th>
                                        <th>Board Code</th>
                                        <th>MOC Code</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="MOCBoardTableEdit" moc_board_id="{{ $moc_board->id }}">
                                    @foreach($moc_boards as $key=>$moc_board)
                                    <tr class="gradeX DrapRow" item_id="{{$moc_board->id}}">
                                        <td class="text-center">{!! ($key+1)+(15*($moc_boards->currentPage()-1)) !!}
                                        </td>                                       
                                        <td>{{$moc_board->board}}</td>
                                        <td>{{$moc_board->board_code}}</td>
                                        <td>{{$moc_board->moc_code}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('moc-boards.edit', $moc_board->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$moc_board->id}}" method="POST"
                                                action="{{ route('moc-boards.destroy', $moc_board->id) }}"
                                                class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="deleteConfirmation('del-{{$moc_board->id}}'); return false;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$moc_boards->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No MOC Board Available</h4>
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