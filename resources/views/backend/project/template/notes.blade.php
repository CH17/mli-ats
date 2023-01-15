<div class="ibox float-e-margins">
    <div class="ibox-content">
        <div class="notes form-group row mb-4">
            <label for="notes" class="col-form-label">Notes:</label>
            <div class="col-md-12">
                @if (!empty($project->notes))
                    <p class="small">
                        {{ $project->notes }}
                    </p>
                @else
                    <p class="small">N/A</p>
                @endif
            </div>
        </div>

        <div class="notes form-group row mb-4">
            <label for="doa_or_ed_notes" class="col-form-label">DoA/ED Notes:</label>
            <div class="col-md-12">
                @if (!empty($project->doa_or_ed_notes))
                    <p class="small">
                        {{ $project->doa_or_ed_notes }}
                    </p>
                @else
                    <p class="small">N/A</p>
                @endif
            </div>
        </div>
    </div>
</div>


<form id="updateNotes" action="{{ route('project-note.update', ['project' => $project->id]) }}"
    method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            @if(!empty($user_role) && $user_role=='ADMIN' || $user_role=='ED'|| $user_role=='PM' || $user_role=='DoA')
            <div class="form-group">
                <label for="is_ats_form_ready">Form Ready?</label>
                    <select id="is_ats_form_ready" class="form-control chosen-select" name="is_ats_form_ready"
                        data-placeholder="(Select one)">
                        <option selected></option>
                        <option value="1" @if($project->is_ats_form_ready==1) selected @endif>Yes</option>
                        <option value="0" @if($project->is_ats_form_ready==0) selected @endif>No</option>                        
                        <option value="2" @if($project->is_ats_form_ready==2) selected @endif>On Hold</option>
                        
                    </select>
            </div>
            @endif
            
            <div class="form-group">
                <label for="notes" class="col-form-label">Notes:</label>
                    <textarea name="notes" class="form-control" id="notes" cols="30"
                        rows="4">{{ $project->notes }}</textarea>
                    <div class="error_notes error_message"></div>
            </div>
            @if ((!empty($user_role) && $user_role == 'ADMIN') || $user_role == 'ED' || $user_role == 'DoA')
                <div class="form-group mt-4">
                    <label for="doa_or_ed_notes" class="col-form-label">DoA/ED Notes:</label>
                        <textarea name="doa_or_ed_notes" id="doa_or_ed_notes" class="form-control" cols="30"
                            rows="4">{{ $project->doa_or_ed_notes }}</textarea>
                        <div class="error_doa_or_ed_notes error_message"></div>
                </div>
            @endif
            @if ((!empty($user_role) && $user_role == 'ADMIN') || $user_role == 'ED' || $user_role == 'DoA' || $user_role == 'PM')
                <input type="submit" class="btn btn-primary text-left" value="Update">
            @endif
        
    </div>
</div>
</form>
