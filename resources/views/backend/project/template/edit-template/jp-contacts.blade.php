@php
$jp_contacts_arr = [];
$jp_contact_projects = $project->jp_contacts;
if(!empty($jp_contact_projects)){
    foreach ($jp_contact_projects as $jp_contact) {
    $jp_contacts_arr[] = $jp_contact->id;
    }
}
@endphp

<label for="jp_contact">JP Contact</label>
<div class="form-group">
    <select id="jp_contacts" class="form-control chosen-select" name="jp_contact_id[]" data-placeholder="Select one/multiple JP contact" multiple>
        @foreach ($jp_contacts as $jp_contact)
        <option value="{{ $jp_contact->id }}" @if(!empty($jp_contacts_arr) && in_array($jp_contact->id,
            $jp_contacts_arr)) selected @endif>{{ $jp_contact->contact_name }}</option>
        @endforeach
    </select>
</div>

