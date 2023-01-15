<div class="ibox-content">
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <ul class="list-style-none">
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    <form action="{{ route('educational-partner-contacts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="form-group @error('ep_id') has-error @enderror">
                    <label for="ep_id">Select Educational Partner</label>
                    {!! Form::select('ep_id',$educationalPartners , old('ep_id'), array('class' => 'form-control
                    chosen-select','placeholder'=>'Select Educational Partner') ); !!}
                    @error('ep_id')
                    <div class="inline-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group @error('contact_name') has-error @enderror">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name') }}" class="form-control @error('contact_name') is-invalid @enderror">
                    @error('contact_name')
                    <div class="inline-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group @error('contact_email') has-error @enderror">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" class="form-control @error('contact_email') is-invalid @enderror">
                    @error('contact_email')
                    <div class="inline-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="telephone1">Telephone</label>
                    <input type="text" name="telephone1" id="telephone1" value="{{ old('telephone1') }}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="telephone2">Mobile</label>
                    <input type="text" name="telephone2" id="telephone2" value="{{ old('telephone2') }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name" class="display-block">&nbsp;</label>
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </div>
        </div>

    </form>
    <div class="clear"></div>
</div>