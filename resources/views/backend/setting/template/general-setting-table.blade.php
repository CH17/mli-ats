<div class="ibox float-e-margins DueDays">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>General Settings</h5>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-md-4">
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <ul class="list-style-none">
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
       
        <form action="{{ route('general-setting.store') }}" method="POST">
            @csrf
            <div class="row col-md-4">
                <div class="form-group @error('due_days') has-error @enderror"">
                    <label for="due_days">Set Due Business Day</label>
                    {!! Form::select('due_days',$business_days , $due_days, array('class' => 'form-control
                    chosen-select','placeholder'=>'Set Due Business Day') ); !!}
                    @error('due_days')
                    <div class="inline-errors">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="display-block">&nbsp;</label>
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </div>
           
        </form>
        <div class="clear"></div>
    </div>
</div>