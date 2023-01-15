<div class="ibox float-e-margins">


    <div class="ibox-title">
        <h5>Change Status</h5>
    </div>

    <div class="ibox-content text-center">

        @if (!empty($project->managedby))
            @if ($project->status_id != 9)
                @if (!empty($is_user) || ($user_role == 'ADMIN' || $user_role == 'ED'|| $user_role == 'DoA' || $user_role == 'PM'))

                    <form id="change-status" action="{{ route('project.status', ['project' => $project->id]) }}"
                        method="POST">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="row mb-4 ml-2 mr-2">
                            <div class="col-md-5 project_status">{{ $project->project_status->name }}</div>
                            <div class="col-md-2 changeStatusArrow">=></div>
                            <div class="col-md-5 next_status">{{ $next_status->name }}</div>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="status" value="{{ $next_status->id }}">
                            <a href="javascript:void(0)" class="btn btn-lg btn-primary"
                                onclick="changeStatus('change-status')">Submit</a>
                        </div>
                        <div class="clear"></div>

                    </form>
                @endif
            @else
                @if (!empty($is_user) || ($user_role == 'ADMIN' || $user_role == 'ED'|| $user_role == 'DoA'))

                    <form id="change-status" action="{{ route('project.status', ['project' => $project->id]) }}"
                        method="POST">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="row mb-4 ml-2 mr-2">
                            <div class="col-md-5 project_status">Closed</div>
                            <div class="col-md-2 changeStatusArrow">=></div>
                            <div class="col-md-5 next_status">Proposed</div>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="status" value="1">
                            <a href="javascript:void(0)" class="btn btn-lg btn-primary"
                                onclick="changeStatus('change-status')">Submit</a>
                        </div>
                        <div class="clear"></div>

                    </form>
                @endif
            @endif
        @else
            <div class="text-left">
                <label>No PM selected</label>
            </div>
        @endif

    </div>

</div>
