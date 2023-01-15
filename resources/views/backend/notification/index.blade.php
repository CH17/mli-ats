@extends('backend.layouts.master')
@section('title', 'Notifications')
@section('content')

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">                

                <div class="ibox-title">
                    <div class="titleWrap">
                        <h5>All Notifications</h5>
                    </div>
                    <form action="{{ route('notification-lists') }}" method="GET">
                        <div class="row">
                            <div class="col-md-10">                    
                                <input type="text" class="form-control" placeholder="Search by Activity ID" name="q" value="{{ $filter ?? '' }}">
                            </div>                            
                            <div class="col-md-2">
                                <div class="FilterButton">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>  
                                <div class="ClearButton">
                                    <a href="{{ route('notification-lists') }}" class="btn btn-danger">Reset</a>
                                </div>  
                            </div>           
                        </div>           
                        
                    </form>
                </div>

                @if(count($notification_lists))
                <div class="ibox-content no-padding notification" style="margin-left: 15px; margin-right: 15px;">
                    @foreach ($notification_lists as $notification)
                    @php
                    $message = $notification->data;
                    @endphp

                    <div class="list-group-item row">
                        <div class="Message col-md-10">
                            <p>
                                <a class="color-676a6c {{ !empty($notification->read_at) ? 'read' : 'notRead' }}"
                                    href="@if(!empty($message['project_id'])){{route('project.show',$message['project_id'])}}?notification_id={{$notification->id}}@else # @endif"><i
                                        class="fa fa-bell mr-5"></i>
                                    {{!empty($message['message'])?$message['message']:''}}
                                    <small class="pull-right text-muted small"><i class="fa fa-clock-o"></i>
                                        {{$notification->created_at->diffForHumans()}}
                                    </small>
                                </a>
                            </p>
                        </div>
                        <div class="MarkAsReadBtn col-md-2">
                            @if(empty($notification->read_at))
                            <a href="javascript:void(0)" class="btn btn-danger MarkAsRead"
                                onclick="readNotification('{{$notification->id}}')">Mark As Read</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="dataTables_paginate paging_simple_numbers">
                    {{$notification_lists->appends(request()->query())->links()}}
                </div>
                @else
                <div class="ibox-content">
                    <div class="text-center p-10">
                        <h4>No notification available.</h4>
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>


</div>


@endsection