<div class="ibox float-e-margins">
                
        <div class="ibox-content">
            <div class="row m-t-sm">
                <div class="col-lg-12">
                    <div class="panel blank-panel">
                        
                        <div class="panel-heading">
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-1" data-toggle="tab">Users messages</a></li>
                                    <li class=""><a href="#tab-2" data-toggle="tab">Last activity</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            @php
                                $messages=$project->messages;                               
                            @endphp
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">
                                    <div class="feed-activity-list">
                                        @if(count($messages))
                                        <div class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs">Load More</a>
                                        </div>
                                        @endif
                                        
                                        @forelse($messages as $message)
                                        <div class="feed-element">
                                            
                                            <a href="#" class="pull-left">
                                                @if(!empty($message->user->avatar))
                                                    <img alt="{{$message->user->name}}" class="img-circle" src="{{asset($message->user->avatar)}}">
                                                @else                                                   
                                                    <img  class="img-circle" src="{{asset('backend/images/profile_small.png')}}" alt="{{$message->user->name}}">
                                                @endif
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">{{$message->created_at->diffForHumans()}}</small>
                                                <strong>{{$message->user->name}}</strong><br>
                                            <small class="text-muted">@if($message->created_at->diffInDays()==0) Today @elseif($message->created_at->diffInDays()==1) Yestarday at @else {{$message->created_at->diffForHumans()}} at @endif {{date('g:i a- d.m.Y',strtotime($message->created_at))}}</small>
                                                <div class="well">
                                                    {{$message->message}}
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <h5>No message available</h5>
                                        @endforelse
                                        
                                    </div>

                                    <div class="social-footer ">
                                        <div class="social-comment">
                                            <a href="" class="pull-left">
                                               
                                                @if(!empty(Auth::user()->avatar))
                                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="{{Auth::user()->name}}">
                                                @else 
                                                    <img src="{{asset('backend/images/profile_small.png')}}" alt="{{Auth::user()->name}}">
                                                @endif
                                            </a>
                                            <div class="media-body">
                                                <form id="send-message" action="{{route('messages.store')}}" method="POST">
                                                    @csrf
                                                    <textarea class="form-control" name="message" placeholder="Write comment..."></textarea>
                                                    <div class="error_message error_message"></div> 
                                                    <input type="hidden" name="project_id" value="{{$project->id}}">
                                                </form>   
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>


                                <div class="tab-pane social-feed-box" id="tab-2">

                                    <div class="social-footer">

                                        @forelse ($project->activities as $activity)
                                        <div class="social-comment bb-1 mb-10">                                            
                                            <div class="pull-left"><i class="fa fa-edit"></i></div>
                                            <div class="media-body">
                                               Edited by 
                                                <a href="#">
                                                    {{$activity->project_user->name ?? ''}}
                                                </a>                                                
                                                <br>
                                                
                                                @php
                                                $changes=unserialize($activity->changes);
                                                   //print_r($changes);
                                                @endphp

                                                @if(!empty($changes['updated_at']['after']))
                                                    -<small class="text-muted">{{date('d,m.Y',strtotime($changes['updated_at']['after']))}}</small>
                                                @endif
                                            </div>
                                        </div>
                                        @empty 
                                        <div class="text-center">
                                            <h5>No activity available</h5>
                                        </div>
                                        @endforelse
                                                  
                                        
            
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>