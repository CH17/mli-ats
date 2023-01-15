<div id="editAccreditorNonMliData-{{$credit_type->id}}">                                                        
    <label for="level">Accreditor</label>
    <div class="form-group">
        <input name="non_mli_accreditor_{{$credit_type->id}}" type="text"
            class="form-control" placeholder=""
            @if(!empty($credit_type->accreditation_types_non_mli->where('credit_type_id',
        $credit_type->id)->where('project_id', $project->id)->first()))
        value="{{$credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->accreditor}}"
        @endif>
    </div>                                                       
</div>