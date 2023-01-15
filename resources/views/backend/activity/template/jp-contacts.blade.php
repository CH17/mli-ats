<label for="jp_contact">JP Contact</label>
<div class="form-group">
    <select id="jp_contacts" class="form-control chosen-select" name="jp_contact_id[]" data-placeholder="Select one/multiple JP contact" multiple>
        @foreach ($jp_contacts as $jp_contact)
        <option value="{{ $jp_contact->id }}">{{ $jp_contact->contact_name }}</option>
        @endforeach
    </select>
</div>
<div class="clear"></div>