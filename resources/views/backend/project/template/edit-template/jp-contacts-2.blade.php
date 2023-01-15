@php
$jp2_contacts_arr = [];
$jp2_contact_projects = $project->jp_contacts_2; 
if(!empty($jp2_contact_projects)){
    foreach ($jp2_contact_projects as $jp_contact) {
    $jp2_contacts_arr[] = $jp_contact->id;
    } 
}   
@endphp

<label for="jp2_contact">JP Contact 2</label>
<div class="form-group">
    <select id="jp2_contacts" class="form-control chosen-select" name="jp_contact_id_2[]" data-placeholder="Select one/multiple JP contact" multiple>                                   
        @foreach ($jp2_contacts as $jp_contact)                                   
        <option value="{{ $jp_contact->id }}" @if(count($jp2_contacts_arr) > 0 
            && in_array($jp_contact->id, $jp2_contacts_arr)) selected @endif>{{ $jp_contact->contact_name }}</option>
        @endforeach
    </select>
</div>

