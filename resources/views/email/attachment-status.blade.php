@component('mail::message')
Hello,<br>

{{ $message }}

Please click <a style="text-decoration: none;" href="{{route('project.evidence.edit',['project'=> $project->id])}}">here</a> to check.

Thanks<br>
@endcomponent