<div class="ibox float-e-margins outcome">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Select an activity for batch(es)</h5>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-md-6">
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <ul class="list-style-none">
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
                <form action="{{ route('activity.participant') }}" method="GET" id="SelectActivityForm">
                    <div class="form-group SelectActivity">
                        <label for="project_id">Select Activity</label>
                        {!! Form::select('id',$projects , null, array('class' => 'form-control
                        chosen-select isSelectedActivityForPar','placeholder'=>'Select Activity') ); !!}
                    </div>
                </form>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>


<div id="Activity-Participant-Details">
</div>
<div id="ImportCsvActPar">
</div>