<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Assign Users</h5>
    </div>
    <div class="ibox-content">
        <div class="form-group">
            <label for="managed_by">Project Manager</label>
            {!! Form::select('managed_by', $user_array['PM'], null, array('class' =>
            'form-control
            chosen-select','placeholder'=>'Select Managed By') ); !!}
        </div>

        <div class="form-group">
            <label for="assigned_to">Accreditation Supervisor</label>
            {!! Form::select('assigned_to', $user_array['DoA'], 15, array('class' =>
            'form-control chosen-select','placeholder'=>'Select Assigned To') ); !!}
        </div>

        <div class="form-group">
            <label for="used_by">Final Review</label>
            {!! Form::select('used_by',$user_array['ED'], 10, array('class' =>
            'form-control
            chosen-select','placeholder'=>'Select Used By') ); !!}
        </div>
    </div>
</div>