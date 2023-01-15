@extends('backend.layouts.master')
@section('title', 'Users')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            
            <li class="active">
                <strong>Edit Profile</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-lg m-t-lg">
       
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                
                <div class="ibox-title">
                    <h5>Edit</h5>
                </div>
        
                <div class="ibox-content">
                    <form id="update_user_data" action="{{route('profile.update',['user'=>$user->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="text-center">
                            <div class="profile-image">
                                @if(!empty($user->avatar))
                                    <img src="{{ asset($user->avatar) }}" class="img-circle circle-border m-b-md" alt="{{$user->name}}">
                                @else 
                                <img src="{{asset('backend/images/profile_small.png')}}" class="img-circle circle-border m-b-md" alt="{{$user->name}}">
                                @endif
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="text-center">                        
                            <div class="btn-group">
                                <label title="Upload image file" for="profile_image" class="btn btn-primary">
                                    <input type="file" name="profile_image" id="profile_image" class="hide">
                                    Upload Profile
                                </label>                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Initials</label>
                            <input type="text" name="initials" class="form-control" value="{{$user->initials}}"> 
                            <div class="error_initials error_message"></div>                           
                        </div>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}"> 
                            <div class="error_name error_message"></div>                           
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            <div class="error_email error_message"></div>                           
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary">

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="ibox float-e-margins">
                
                <div class="ibox-title">
                    <h5>Change Password</h5>
                </div>
        
                <div class="ibox-content">
                    <form id="update-password" action="{{ route('change.password') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label>Old Password *</label>
                            <input id="current_password" name="current_password" type="password" class="form-control required">
                            <div class="error_current_password error_message"></div> 
                        </div>
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




        
    </div>

</div>
    
@endsection