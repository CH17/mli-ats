@extends('backend.layouts.master')
@section('title', 'Edit Educational Partner Contact')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Educational Partner Contact</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('educational-partner-contacts.index')}}">Educational Partner Contact</a>
            </li>
            <li class="active">
                <strong>Edit Educational Partner Contact</strong>
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
                    <h5>Edit Educational Partner Contact</h5>
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
                            <form action="{{ route('educational-partner-contacts.update', $epContact->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('ep_id') has-error @enderror">
                                            <label for="ep_id">Select Joint Provider</label>
                                            {!! Form::select('ep_id',$educationalPartners , $epContact->ep_id, array('class'
                                            =>
                                            'form-control
                                            chosen-select','placeholder'=>'Select Joint Provider') ); !!}
                                            @error('ep_id')
                                            <div class="inline-errors">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('contact_name') has-error @enderror">
                                            <label for="contact_name">Contact Name</label>
                                            <input type="text" name="contact_name" id="contact_name" value="{{ $epContact->contact_name }}" class="form-control @error('contact_name') is-invalid @enderror">
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
                                            <input type="text" name="contact_email" id="contact_email" value="{{ $epContact->contact_email }}" class="form-control @error('contact_email') is-invalid @enderror">
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
                                            <input type="text" name="telephone1" id="telephone1" value="{{ $epContact->telephone1 }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telephone2">Mobile</label>
                                            <input type="text" name="telephone2" id="telephone2" value="{{ $epContact->telephone2 }}" class="form-control">
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
                        @include('backend.ep-contact.template.ep-contact-list-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection