<div id="editPharmacologyData-{{$credit_type->id}}">
    @if(!empty($credit_type->has_pharmacology_amount) &&
    $credit_type->has_pharmacology_amount==1)
        <label for="pharmacology_amount">Pharmacology
            Amount</label>
        <div class="form-group">
            <input name="pharmacology_amount{{$credit_type->id}}" type="text" class="form-control" placeholder=""
            @if(!empty($credit_type->accreditation_types->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()))
        value="{{$credit_type->accreditation_types->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->pharmacology_amount}}" @endif>
        </div>   
    @endif
</div>