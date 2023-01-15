<div id="import-csv-form">
    <form action="{{ route('outcome.report.import', ['project_id' => $project_id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="ibox float-e-margins outcome">
            <div class="ibox-title">
                <div class="titleWrap">
                    <h5>Batch Information</h5>
                </div>
            </div>
            <div class="ibox-content">
                <div class="col-md-12 pl-0">
                    @if(count($outcomes) > 0)
                    <div class="AvailableBatch">
                        @foreach ($outcomes as $outcome)
                        <label>Batch: {{$outcome->batch}} Updated at:
                            {{$outcome->updated_at->format('d/m/Y')}}</label><br>
                        @endforeach
                    </div>
                    @else
                    <div class="NotAvailableBatch">
                        <label>No Batch Available</label>
                    </div>
                    @endif
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="ibox float-e-margins outcome">
            <div class="ibox-title">
                <div class="titleWrap">
                    <h5>Upload EM Analysis Report</h5>
                </div>
            </div>
            <div class="ibox-content">
                <div class="BatchMerge">
                    <div class="col-md-12">
                        <label>Choose One:</label>
                    </div>
                    <div class="col-md-3 radio radio-primary">
                        <input class="form-check-input" type="radio" name="batch_status" value="remove" checked>
                        <label class="form-check-label" for="batch">Remove previous batch(es)</label>
                    </div>
                    <div class="col-md-3 radio radio-primary">
                        <input class="form-check-input" type="radio" name="batch_status" value="merge">
                        <label class="form-check-label" for="batch">Merge with previous batch(es)</label>
                    </div>
                </div>
                <div class="col-md-12 pl-0">
                    <label for="Import" class="OutcomeLevel">EM Analysis Report CSV:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="csv_file">
                        <label class="custom-file-label" for="csv_file"></label>
                    </div>
                    <div class="uploadBtn">
                        <button type="submit" for="csv" class="btn btn-danger">Import</button>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </form>
</div>