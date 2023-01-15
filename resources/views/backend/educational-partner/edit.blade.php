@extends('backend.layouts.master')
@section('title', 'Edit Educational Partner')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Educational Partner</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('educational-partners.index')}}">Educational Partner</a>
            </li>
            <li class="active">
                <strong>Edit Educational Partner</strong>
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
                    <h5>Edit Educational Partner</h5>
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
                            <form action="{{ route('educational-partners.update', $educationalPartner->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="name">Provider Name</label>
                                            <input type="text" name="name" id="name" value="{{$educationalPartner->name}}" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('ep_code') has-error @enderror">
                                            <label for="ep_code">Provider Code</label>
                                            <input type="text" name="ep_code" id="ep_code" value="{{$educationalPartner->ep_code}}" class="form-control @error('ep_code') is-invalid @enderror">
                                            @error('ep_code')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('address1') has-error @enderror">
                                            <label for="name">Address: 1</label>
                                            <input type="text" name="address1" id="address1" value="{{$educationalPartner->address1}}" class="form-control @error('address1') is-invalid @enderror">
                                            @error('address1')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('address2') has-error @enderror">
                                            <label for="name">Address: 2</label>
                                            <input type="text" name="address2" id="address2" value="{{$educationalPartner->address2}}" class="form-control @error('address2') is-invalid @enderror">
                                            @error('address2')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('city') has-error @enderror">
                                            <label for="city">City</label>
                                            <input type="text" name="city" id="city" value="{{$educationalPartner->city}}" class="form-control @error('city') is-invalid @enderror">
                                            @error('city')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('state') has-error @enderror">
                                            <label for="state">State</label>
                                            <input type="text" name="state" id="state" value="{{$educationalPartner->state}}" class="form-control @error('state') is-invalid @enderror">
                                            @error('state')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('zip') has-error @enderror">
                                            <label for="zip">Zip</label>
                                            <input type="text" name="zip" id="zip" value="{{$educationalPartner->zip}}" class="form-control @error('zip') is-invalid @enderror">
                                            @error('zip')
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
                            @if(count($educationalPartners))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>EP Code</th>
                                        <th>Address 1</th>
                                        <th>Address 2</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($educationalPartners as $key=>$educationalPartner)
                                    <tr class="gradeX">
                                        <td class="text-center">{!! ($key+1)+(15*($educationalPartners->currentPage()-1)) !!}
                                        </td>
                                        <td>{{$educationalPartner->name}}</td>
                                        <td>{{$educationalPartner->ep_code}}</td>
                                        <td>{{$educationalPartner->address1}}</td>
                                        <td>{{$educationalPartner->address2}}</td>
                                        <td>{{$educationalPartner->city}}</td>
                                        <td>{{$educationalPartner->state}}</td>
                                        <td>{{$educationalPartner->zip}}</td>
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle" href="{{ route('educational-partners.edit', $educationalPartner->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            @if(!empty($user_role) && $user_role=='ADMIN')
                                            <form id="del-{{$educationalPartner->id}}" method="POST" action="{{ route('educational-partners.destroy', $educationalPartner->id) }}" class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteConfirmation('del-{{$educationalPartner->id}}'); return false;"><i class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$educationalPartners->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No Joint Provider Available</h4>
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