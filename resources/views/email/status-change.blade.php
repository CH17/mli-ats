@component('mail::message')
@php
$provider = null;
if(!empty($project->joint_provider)){
$provider = $project->joint_provider->jp_code;
}
@endphp
Hello,<br>
Activity #{{$project->activity_id}} has changed to {{ $status }} recently. Here are some important information about that
Activity.

Activity ID: {{$project->activity_id}}<br>
Project ID: {{$project->project_code}}<br>
Provider: {{$provider}}<br>
Activity Type: {{$project->activity_type ?? ''}}<br>
Activity Overview: {{$project->providership ?? ''}}<br>
Commercial Support Received: {{$project->has_commercial_support ?? ''}}<br>

Start Date: {{$project->start_date}}<br>
Expiration Date: {{$project->expiration_date ?? ''}}<br>
Last Updated: {{date('Y-m-d',strtotime($project->updated_at))}}<br>

Please check more <a style="text-decoration: none;" href="{{route('project.edit',['project'=> $project->id])}}">here</a>

Thanks<br>
@endcomponent