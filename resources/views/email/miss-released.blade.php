@component('mail::message')
Hello,<br>

<p>Education manager: {{ $project->managedby->initials  }}</p>

<p>The activity release date has been missed for one or more activities.  Please update the form and attachment(s) immediately and inform the Director of Accreditation that the activity is ready for review.</p>
<p>
    Activity ID:  {{$project->activity_id}} <br/>
    Release Date: {{$project->start_date}} 
</p>

<p>If there is a systemic problem which precludes the updating of information, email <a href="mailto:cgusack@mlicme.org">cgusack@mlicme.org</a> with details of why the activity cannot be updated.</p>

Thanks<br>
@endcomponent