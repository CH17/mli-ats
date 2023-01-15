<div class="ibox float-e-margins">


    <div class="ibox-title">
        <h5>Force Status Change</h5>
    </div>

    <div class="ibox-content">


        <form id="force-status-change" action="{{ route('project.status', ['project' => $project->id]) }}"
            method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="jp_id">Select Status</label>
                {!! Form::select('status', $project_status, $project->project_status->id, ['class' => 'form-control  chosen-select', 'placeholder' => 'Select Status']) !!}
            </div>
            <div class="text-left">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <div class="clear"></div>
        </form>

    </div>

</div>
