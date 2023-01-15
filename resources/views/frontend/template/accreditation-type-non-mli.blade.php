<div class="row Type" id="accreditationTypeNonMliData-{{$credit_type->id}}">
    <div class="form-group">
        <input type="hidden" name="accreditation_types_non_mli[]" value="{{$credit_type->id}}">
        <input type="hidden" name="non_mli[]" value="0">
        <span class="tag-item" ondragstart="dragStart(event)" draggable="true" id="{{$credit_type->id}}">
            {{$credit_type->credit_code}}
        </span>
    </div>
</div>
