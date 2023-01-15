<div class="row" id="editCriteriaNonMliData-{{$credit_type->id}}">
    @php
    $credit_cri_arr = null;
    if(!empty($credit_type->criteria)){
        $credit_cri_arr = json_decode($credit_type->criteria);                                            
    }                                            
    $criteria_array = null;
    if(!empty($credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first())){
    $criteria_array = json_decode($credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->criteria);
    }
    @endphp                                                                                      
    @foreach ($criteria_list as $key => $criteria)
        @if(!empty($credit_cri_arr) && in_array($key, $credit_cri_arr))
        <div class="col-md-4">
            <div class="checkbox-block checkbox checkbox-primary form-group">
                <input class="form-check-input" 
                type="checkbox" 
                id="non_mli_criteria_{{$credit_type->id}}_{{ $loop->index }}" 
                name="non_mli_criteria_{{$credit_type->id}}[]" value="{{$key}}" @if(!empty($criteria_array) && in_array($key, $criteria_array)) checked @endif>
                <label class="form-check-label" for="non_mli_criteria_{{$credit_type->id}}_{{ $loop->index }}">{{$key}}</label>                  
            </div>
        </div>          
        @endif
    @endforeach                                         
</div>