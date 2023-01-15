<div class="form-group col-md-3">
    <label for="ep_1">Educational Partner -1 Available?</label>
    <div class="row">
        <div class="col-md-4">
            <div class="radio radio-primary">
                <input class="form-check-input has_ep_1_edit" type="radio" name="has_ep_1" id="has_ep_yes" value="1" @if($project->has_ep_1==1) checked @endif>
                <label class="form-check-label" for="has_ep_yes">Yes</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="radio radio-primary">
                <input class="form-check-input has_ep_1_edit" type="radio" name="has_ep_1" id="has_ep_no" value="0" @if($project->has_ep_1==0) checked @endif>
                <label class="form-check-label" for="has_ep_no">No</label>
            </div>
        </div>
    </div>
</div>

@php
$partner_1 = '';
if(!empty($project->educational_partner_1)){
$partner_1 = $project->educational_partner_1;
}
@endphp
<div class="form-group col-md-3 EditEP1 @if($project->has_ep_1 == 0) d-none @endif">
    <label for="ep_id_1">Educational Partner -1</label>
    <div class="form-group">
        <select id="EditEducationalPartner1" class="form-control chosen-select" project_id="{{$project->id}}" name="ep_id_1" data-placeholder="(Select one)">
            <option selected></option>
            @foreach ($educational_partners as $partner)
            <option value="{{ $partner->id }}" @if(!empty($partner_1) && $partner_1->id==$partner->id) selected @endif>{{ $partner->ep_code }}
            </option>
            @endforeach
        </select>
    </div>
</div>

@php

$ep1_contacts_arr = [];
$ep1_contact_projects = $project->ep_contacts_1;
if(!empty($ep1_contact_projects)){
foreach ($ep1_contact_projects as $ep_contact) {
$ep1_contacts_arr[] = $ep_contact->id;
}
}
@endphp
<div id="EditEPContacts1" class="form-group col-md-3 @if($project->has_ep_1 == 0) d-none @endif">
    <label for="jp3_contact">EP Contact -1</label>
    <div class="form-group">
        <select id="ep_contacts" class="form-control chosen-select" name="ep_contact_id_1[]" data-placeholder="Select one/multiple EP contact" multiple>
            @foreach ($ep_contacts_1 as $ep_contact)
            <option value="{{ $ep_contact->id }}" @if(count($ep1_contacts_arr)> 0
                && in_array($ep_contact->id, $ep1_contacts_arr)) selected @endif>{{ $ep_contact->contact_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div id="EP_CR_Code_1" class="form-group col-md-3 @if($project->has_ep_1 == 0) d-none @endif">
    <label>EP CR Code -1</label>
    <div class="form-group">
        <input type="text" class="form-control" value="{{$project->ep_cr_code_1 ?? ''}}" name="ep_cr_code_1">
    </div>
</div>
<div class="clear"></div>

<!-- EP Contact 2 Start-->

<div class="form-group col-md-3">
    <label for="ep_2">Educational Partner -2 Available?</label>
    <div class="row">
        <div class="col-md-4">
            <div class="radio radio-primary">
                <input class="form-check-input has_ep_2_edit" type="radio" name="has_ep_2" id="has_ep_2_yes" value="1" @if($project->has_ep_2==1) checked @endif>
                <label class="form-check-label" for="has_ep_2_yes">Yes</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="radio radio-primary">
                <input class="form-check-input has_ep_2_edit" type="radio" name="has_ep_2" id="has_ep_2_no" value="0" @if($project->has_ep_2==0) checked @endif>
                <label class="form-check-label" for="has_ep_2_no">No</label>
            </div>
        </div>
    </div>
</div>

@php
$partner_2 = '';
if(!empty($project->educational_partner_2)){
$partner_2 = $project->educational_partner_2;
}
@endphp
<div class="form-group col-md-3 EditEP2 @if($project->has_ep_2 == 0) d-none @endif">
    <label for="ep_id_2">Educational Partner -2</label>
    <div class="form-group">
        <select id="EditEducationalPartner2" class="form-control chosen-select" project_id="{{$project->id}}" name="ep_id_2" data-placeholder="(Select one)">
            <option selected></option>
            @foreach ($educational_partners as $partner)
            <option value="{{ $partner->id }}" @if(!empty($partner_2) && $partner_2->id==$partner->id) selected @endif>{{ $partner->ep_code }}
            </option>
            @endforeach
        </select>
    </div>
</div>

@php

$ep2_contacts_arr = [];
$ep2_contact_projects = $project->ep_contacts_2;
if(!empty($ep2_contact_projects)){
foreach ($ep2_contact_projects as $ep_contact) {
$ep2_contacts_arr[] = $ep_contact->id;
}
}
@endphp
<div id="EditEPContacts2" class="form-group col-md-3 @if($project->has_ep_2 == 0) d-none @endif">
    <label for="jp3_contact">EP Contact -2</label>
    <div class="form-group">
        <select id="ep_contacts_2" class="form-control chosen-select" name="ep_contact_id_2[]" data-placeholder="Select one/multiple EP contact" multiple>
            @foreach ($ep_contacts_2 as $ep_contact)
            <option value="{{ $ep_contact->id }}" @if(count($ep1_contacts_arr)> 0
                && in_array($ep_contact->id, $ep2_contacts_arr)) selected @endif>{{ $ep_contact->contact_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div id="EP_CR_Code_2" class="form-group col-md-3 @if($project->has_ep_2 == 0) d-none @endif">
    <label>EP CR Code -2</label>
    <div class="form-group">
        <input type="text" class="form-control" value="{{$project->ep_cr_code_2 ?? ''}}" name="ep_cr_code_2">
    </div>
</div>
<div class="clear"></div>
<!-- EP contact 2 End -->
<hr>