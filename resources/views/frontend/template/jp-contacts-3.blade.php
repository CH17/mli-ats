<div class="row mb-3">
    <div class="col-md-3">
        <label for="jp3_contacts">JP Contacts 3</label>
    </div>
    <div class="form-group col-md-9">
        <select id="jp3_contacts" class="form-control chosen-select" name="jp_contact_id_3[]" data-placeholder="Select one/multiple JP contact" multiple>           
            @foreach ($jp3_contacts as $jp_contact)
            <option value="{{ $jp_contact->id }}">{{ $jp_contact->contact_name }}</option>
            @endforeach
        </select>
    </div>
</div>
