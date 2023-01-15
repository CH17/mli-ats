@extends('backend.layouts.master')
@section('title', 'Edit Joint Provider Contact')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Joint Provider Contact</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('joint-provider-contacts.index')}}">Joint Provider Contact</a>
            </li>
            <li class="active">
                <strong>Edit Joint Provider Contact</strong>
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
                    <h5>Edit Joint Provider Contact</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="ibox-content">
                            @if(\Session::has('success'))
                            <div class="alert alert-success">
                                <ul class="list-style-none">
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('joint-provider-contacts.update', $jpContact->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('jp_id') has-error @enderror">
                                            <label for="jp_id">Select Joint Provider</label>
                                            {!! Form::select('jp_id',$jointProviders , $jpContact->jp_id, array('class'
                                            =>
                                            'form-control
                                            chosen-select','placeholder'=>'Select Joint Provider') ); !!}
                                            @error('jp_id')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('contact_name') has-error @enderror">
                                            <label for="contact_name">Contact Name</label>
                                            <input type="text" name="contact_name" id="contact_name"
                                                value="{{ $jpContact->contact_name }}"
                                                class="form-control @error('contact_name') is-invalid @enderror">
                                            @error('contact_name')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('contact_email') has-error @enderror">
                                            <label for="contact_email">Contact Email</label>
                                            <input type="text" name="contact_email" id="contact_email"
                                                value="{{ $jpContact->contact_email }}"
                                                class="form-control @error('contact_email') is-invalid @enderror">
                                            @error('contact_email')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telephone1">Telephone</label>
                                            <input type="text" name="telephone1" id="telephone1"
                                                value="{{ $jpContact->telephone1 }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telephone2">Mobile</label>
                                            <input type="text" name="telephone2" id="telephone2"
                                                value="{{ $jpContact->telephone2 }}" class="form-control">
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
                    <div class="col-md-9">
                        <div class="ibox-content">
                            @if(count($jpContacts))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Joint Provider</th>
                                        <th>Contact Name</th>
                                        <th>Contact Email</th>
                                        <th>Telephone</th>
                                        <th>Mobile</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($jpContacts as $key=>$jpContact)
                                    <tr class="gradeX">
                                        <td class="text-center">{!! ($key+1)+(15*($jpContacts->currentPage()-1)) !!}
                                        </td>
                                        <td>{{$jpContact->joint_provider->name}}</td>
                                        <td>{{$jpContact->contact_name}}</td>
                                        <td>{{$jpContact->contact_email}}</td>
                                        <td>{{$jpContact->telephone1}}</td>
                                        <td>{{$jpContact->telephone2}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('joint-provider-contacts.edit', $jpContact->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$jpContact->id}}" method="POST"
                                                action="{{ route('joint-provider-contacts.destroy', $jpContact->id) }}"
                                                class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="deleteConfirmation('del-{{$jpContact->id}}'); return false;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$jpContacts->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No Joint Provider Contact Available</h4>
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