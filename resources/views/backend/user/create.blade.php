@extends('backend.layouts.master')
@section('title', 'Add User')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add User</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('users.index')}}">Users</a>                
            </li>
            <li class="active">
                <strong>Add User</strong>
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
                    <h5>Add User</h5>
                </div>
                <div class="ibox-content">
                    <form id="add-user" action="{{route('usertokens.store')}}" method="POST" >
                        
                        @csrf

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">  
                                <div class="error_name error_message"></div>                            
                            </div>
                        </div>
                        
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control">

                                <div class="error_email error_message"></div>                          
                            </div>
                        </div>
                        
                        <div class="col-md-2">                        
                            <div class="form-group">
                                <label for="role_id">Select Role</label>
                                {!! Form::select('role_id',$roles , null,  array('class' => 'form-control chosen-select','placeholder'=>'Select Role') ); !!}
                                <div class="error_role_id error_message"></div>  
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name" class="display-block">&nbsp;</label>
                                <input type="submit" class="btn btn-primary" value="Add User">
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