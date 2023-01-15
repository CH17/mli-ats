<div class="row Type" id="editAccreditationTypeData-{{$credit_type->id}}">
    <div class="form-group">
        <input type="hidden" name="accreditation_types[]" value="{{$credit_type->id}}">
        <input type="hidden" name="mli[]" value="1">
        <span class="edit-tag-item" ondragstart="dragStart(event)" draggable="true" id="{{$credit_type->id}}">
            {{$credit_type->credit_code}}
        </span>
    </div>
</div>
