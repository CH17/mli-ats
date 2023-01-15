@php
$jp3_contacts_arr = [];
$jp3_contact_projects = $project->jp_contacts_3; 
if(!empty($jp3_contact_projects)){
    foreach ($jp3_contact_projects as $jp_contact) {
    $jp3_contacts_arr[] = $jp_contact->id;
    } 
}   
@endphp

<label for="jp3_contact">JP Contact 3</label>
<div class="form-group">
    <select id="jp3_contact" class="form-control chosen-select" name="jp_contact_id_3[]" data-placeholder="Select one/multiple JP contact" multiple>                                   
        @foreach ($jp3_contacts as $jp_contact)                                   
        <option value="{{ $jp_contact->id }}" @if(count($jp3_contacts_arr) > 0 
            && in_array($jp_contact->id, $jp3_contacts_arr)) selected @endif>{{ $jp_contact->contact_name }}</option>
        @endforeach
    </select>
</div>

