<label for="jp_contact_2">JP Contact 3</label>
<div class="form-group">
    <select id="jp_contacts_3" class="form-control chosen-select" name="jp_contact_id_3[]" data-placeholder="Select one/multiple JP contact" multiple>
        @foreach ($jp_contacts_3 as $jp_contact)
        <option value="{{ $jp_contact->id }}">{{ $jp_contact->contact_name }}</option>
        @endforeach
    </select>
</div>
<div class="clear"></div>