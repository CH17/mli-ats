<ul class="nav nav-tabs">
    <li class="@if ($active=='info' ) active @endif"><a
            href="{{ route('project.edit', $project) }}">Activity Info</a></li>
    <li class="@if ($active=='disclosures' ) active @endif"><a
            href="{{ route('project.disclosures.edit', $project) }}">Disclosures</a></li>
    <li class="@if ($active=='support' ) active @endif"><a
            href="{{ route('project.commercial-support.edit', $project) }}">Commercial Support</a></li>
    <li class="@if ($active=='evidence' ) active @endif"><a
            href="{{ route('project.evidence.edit', $project) }}">Evidence</a></li>
    <li class="@if ($active=='jac' ) active @endif"><a
            href="{{ route('project.jac.edit', $project) }}">JACwC</a></li>

     @if ($user_role == 'ADMIN' || $user_role == 'ED'|| $user_role == 'DoA')
       <li class="@if ($active=='review' ) active @endif"><a
            href="{{ route('project.review', $project) }}">Review</a></li>
        @endif
    
</ul>
