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
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-6">
            <div class="profile-image">
                <img src="{{asset('backend/images/profile_small.png')}}" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                           {{$user->name}}
                        </h2>
                        <h4>{{ implode(',',$user->roles->pluck('description')->toArray())}}</h4>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>
                <tr>
                    <td>
                        <strong>142</strong> Projects
                    </td>
                    <td>
                        <strong>22</strong> Followers
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Comments
                    </td>
                    <td>
                        <strong>54</strong> Articles
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>154</strong> Tags
                    </td>
                    <td>
                        <strong>32</strong> Friends
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="col-md-3">
            <small>Sales in last 24h</small>
            <h2 class="no-margins">206 480</h2>
            <div id="sparkline1"></div>
        </div>
    </div>

</div>
    
@endsection