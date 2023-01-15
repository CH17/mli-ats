<div class="ibox float-e-margins DueDays">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Edit MOF and Participation Record</h5>
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

        <form action="{{ route('mof-report.update', $mof_report->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label>OnePager Produced</label>
                    <input type="text" class="form-control" name="one_pager_produced" value="{{$mof_report->one_pager_produced}}">
                </div>
                <div class="form-group col-md-4">
                    <label>OnePager In-Route</label>
                    <input type="text" class="form-control" name="one_pager_in_route" value="{{$mof_report->one_pager_in_route}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>MOF Uploaded</label>
                    <input type="text" class="form-control" name="mof_uploaded" value="{{$mof_report->mof_uploaded}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Participation Records Uploaded</label>
                    <input type="text" class="form-control" name="participation_uploaded" value="{{$mof_report->participation_uploaded}}">
                </div>
                
            </div>
            <div class="form-group co-md-6">
                <label for="name" class="display-block">&nbsp;</label>
                <input type="submit" class="btn btn-primary" value="Update">
            </div>

        </form>
        <div class="clear"></div>
    </div>
</div>