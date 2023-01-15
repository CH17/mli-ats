<div class="row mb-3">
    <div class="col-md-3">
        <label for="jp_contacts">JP Contacts 2</label>
    </div>
    <div class="form-group col-md-9">
        <select id="jp_contacts" class="form-control chosen-select" name="jp_contact_id_2[]" data-placeholder="Select one/multiple JP contact" multiple>           
            @foreach ($jp2_contacts as $jp_contact)
            <option value="{{ $jp_contact->id }}">{{ $jp_contact->contact_name }}</option>
            @endforeach
        </select>
    </div>
</div>
