<div id="editLevelTextNonMliData-{{$credit_type->id}}">
    @if(!empty($credit_type->level))
    <label for="level">{{$credit_type->level}}</label>
    <div class="form-group">
        <input name="non_mli_level_data_{{$credit_type->id}}" type="text" class="form-control" placeholder=""
        @if(!empty($credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()))
        value="{{$credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->level_data}}" @endif>
    </div> 
    @endif
</div>