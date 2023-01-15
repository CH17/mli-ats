@extends('backend.layouts.master')
@section('title', 'Users')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>

            <li class="active">
                <strong>Edit User</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>Edit</h5>
                </div>
                @php
                    $user_role = Auth::User()->role();
                    $status = array(
                        "active"   => "Active",
                        "inactive" => "Inactive",
                    );
                @endphp

                <div class="row">
                    @if(!empty($user_role) && $user_role=='ADMIN')
                    <div class="col-md-4">                        
                        <div class="ibox-content">
                            <form id="update_user_data" action="{{route('users.update',['user'=>$user->id])}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="initials">Initials</label>
                                            <input type="text" name="initials" value="{{ $user->initials }}"
                                                class="form-control">
                                            <div class="error_initials error_message"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{ $user->name }}"
                                                class="form-control">
                                            <div class="error_name error_message"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" value="{{ $user->email }}"
                                                class="form-control">

                                            <div class="error_email error_message"></div>
                                        </div>
                                    </div>
                                </div>                               

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role_id">Select Role</label>
                                            {!! Form::select('role_id',$roles , $user->role_id(), array('class' =>
                                            'form-control
                                            chosen-select','placeholder'=>'Select Role') ); !!}
                                            <div class="error_role_id error_message"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Select Status</label>
                                            {!! Form::select('status',$status , $user->status, array('class' => 'form-control
                                            chosen-select','placeholder'=>'Select Status') ); !!}
                                            <div class="error_status error_message"></div>
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
                        </div> 
                        <div class="ibox float-e-margins">
                
                            <div class="ibox-title">
                                <h5>Change Password</h5>
                            </div>
                    
                            <div class="ibox-content">
                                <form id="update-user-password" action="{{ route('user.change.password', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf                                   
                                    
                                    <div class="form-group">
                                        <label>New Password *</label>
                                        <input id="password" name="new_password" type="password" class="form-control required">
                                        <div class="error_new_password error_message"></div> 
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password *</label>
                                        <input id="confirm" name="new_confirm_password" type="password" class="form-control required">
                                        <div class="error_new_confirm_password error_message"></div> 
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </form>
                                
            
                            </div>
                        </div>                       
                    </div>
                    @endif
                    <div class="col-md-8">
                        <div class="ibox-content">
                            @if(count($users))
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Initials</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Role</th>
                                        <th>Status</th>
                                        @if(!empty($user_role) && $user_role=='ADMIN')
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $key=>$user)
                                    <tr class="gradeX">
                                        <td class="text-center">{!! ($key+1)+(15*($users->currentPage()-1)) !!}</td>
                                        <td>{{$user->initials}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ implode(',',$user->roles->pluck('name')->toArray())}}</td>
                                        <td class="">
                                            <span
                                                class="badge @if($user->status=='active') badge-primary @endif text-capitalize">
                                                {{$user->status}}
                                            </span>
                                        </td>
                                        @if(!empty($user_role) && $user_role=='ADMIN')
                                        <td class="action-column tooltip-suggestion">
                                            <a class="btn btn-success btn-circle"
                                                href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            
                                            <form method="POST" action="{{route('user.delete',['id'=>$user->id])}}"
                                                class="action-form">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>                                           
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{$users->links()}}
                            </div>
                            @else
                            <div class="text-center">
                                <h4>No user available</h4>
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