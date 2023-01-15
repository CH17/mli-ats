<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Activity Status</h5>
        </div>
    </div>

    <div class="ibox-content">
        @if(count($status_reports))
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Week</th>
                    <th>Proposed</th>
                    <th>New</th>
                    <th>Planning</th>
                    <th>Ready</th>
                    <th>Active</th>
                    <th>Analysis</th>
                    <th>Audit</th>
                    <th>Approved</th>
                    <th>Total</th>
                    <th>Closed</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($status_reports as $key => $status_report )
                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($status_reports->currentPage()-1)) !!}</td>
                    <td>{{date('m/d/Y',strtotime($status_report->week))}}</td>
                    <td>{{ $status_report->proposed }}</td>
                    <td>{{ $status_report->new }}</td>
                    <td>{{ $status_report->planning }}</td>
                    <td>{{ $status_report->ready }}</td>
                    <td>{{ $status_report->active }}</td>
                    <td>{{ $status_report->analysis }}</td>
                    <td>{{ $status_report->audit }}</td>
                    <td>{{ $status_report->approved }}</td>
                    <td>{{ $status_report->total }}</td>
                    <td>{{ $status_report->closed }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="dataTables_paginate paging_simple_numbers">
            {{$status_reports->links()}}
        </div>
        @else
        <div class="text-center">
            <h4>No Activity Status Available</h4>
        </div>
        @endif
    </div>
</div>