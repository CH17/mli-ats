<label for="ep_contact_1">EP Contact -1</label>
<div class="form-group">
    <select id="ep_contacts_1" class="form-control chosen-select" name="ep_contact_id_1[]" data-placeholder="Select one/multiple EP contact" multiple>
        @foreach ($ep_contacts as $ep_contact)
        <option value="{{ $ep_contact->id }}">{{ $ep_contact->contact_name }}</option>
        @endforeach
    </select>
</div>
<div class="clear"></div>