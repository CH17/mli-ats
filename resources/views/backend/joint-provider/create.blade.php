@extends('backend.layouts.master')
@section('title', 'Add Joint Provider')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Joint Provider</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('joint-providers.index')}}">Joint Provider</a>
            </li>
            <li class="active">
                <strong>Add Joint Provider</strong>
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
                    <h5>Add Joint Provider</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('joint-providers.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label for="name">Provider Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('jp_code') has-error @enderror">
                                    <label for="jp_code">Provider Code</label>
                                    <input type="text" name="jp_code" id="jp_code"
                                        class="form-control @error('jp_code') is-invalid @enderror">
                                    @error('jp_code')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('address1') has-error @enderror">
                                    <label for="name">Address: 1</label>
                                    <input type="text" name="address1" id="address1"
                                        class="form-control @error('address1') is-invalid @enderror">
                                    @error('address1')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('address2') has-error @enderror">
                                    <label for="name">Address: 2</label>
                                    <input type="text" name="address2" id="address2"
                                        class="form-control @error('address2') is-invalid @enderror">
                                    @error('address2')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group @error('city') has-error @enderror">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror">
                                    @error('city')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('state') has-error @enderror">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state"
                                        class="form-control @error('state') is-invalid @enderror">
                                    @error('state')
                                    <div class="inline-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('zip') has-error @enderror">
                                    <label for="zip">Zip</label>
                                    <input type="text" name="zip" id="zip"
                                        class="form-control @error('zip') is-invalid @enderror">
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
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>
                            </div>
                        </div>                        

                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection