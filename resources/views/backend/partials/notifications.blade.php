<li class="dropdown">
    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
        <i class="fa fa-bell"></i> <span class="label label-primary">{{ $count}}</span>
    </a>
    <ul class="dropdown-menu dropdown-alerts">
        @if(count($notifications))

        @foreach ($notifications->take(5) as $notification)
        @php
        $message=$notification->data;
        @endphp
        <li>
            <a href="@if(!empty($message['project_id'])){{route('project.show',$message['project_id'])}}?notification_id={{$notification->id}}@else # @endif">
                <div>
                    <i class="fa fa-bell mr-5"></i> {{!empty($message['message'])?$message['message']:''}}
                    <span class="pull-right text-muted small">{{$notification->created_at->diffForHumans()}}</span>
                    <div class="clear"></div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        @endforeach

        <li>
            <div class="text-center link-block">
                <a href="{{ route('notification-lists') }}">
                    <strong>See All Notifications</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </li>
        @else
        <li>
            <div class="text-center link-block">
                No notification available.
            </div>
        </li>
        @endif

    </ul>
</li>