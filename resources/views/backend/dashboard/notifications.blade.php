
    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Notifications</h5>
            </div>

            @if(count($notification_lists))
            <div class="ibox-content no-padding">
                <ul class="list-group">
                    @foreach ($notification_lists as $notification)
                    @php
                    $message=$notification->data;
                    @endphp
                    <li class="list-group-item">
                        <p><a class="color-676a6c"
                                href="@if(!empty($message['project_id'])){{route('project.show',$message['project_id'])}}?notification_id={{$notification->id}}@else # @endif"><i
                                    class="fa fa-bell mr-5"></i> {{!empty($message['message'])?$message['message']:''}}
                                <small class="pull-right text-muted small"><i class="fa fa-clock-o"></i>
                                    {{$notification->created_at->diffForHumans()}} </small> </a></p>

                    </li>
                    @endforeach
                </ul>
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