<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>MOF and Participation Record</h5>
        </div>
    </div>

    <div class="ibox-content">
        @if(count($mof_reports))
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Week</th>
                    <th>Expired But Active Status</th>
                    <th>Analysis</th>
                    <th>Total Expired</th>
                    <th>OnePager Produced</th>
                    <th>OnePager In-Route</th>
                    <th>OnePager Uploaded Attach #4</th>
                    <th>MOF Uploaded</th>
                    <th>Participation Records Uploaded</th>
                    <th>Income /Exp Report Attach #6</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($mof_reports as $key => $mof_report )
                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($mof_reports->currentPage()-1)) !!}</td>
                    <td>{{date('m/d/Y',strtotime($mof_report->week))}}</td>
                    <td>{{ $mof_report->expired_but_active }}</td>
                    <td>{{ $mof_report->analysis }}</td>
                    <td>{{ $mof_report->total_expired }}</td>
                    <td>{{ $mof_report->one_pager_produced }}</td>
                    <td>{{ $mof_report->one_pager_in_route }}</td>
                    <td>{{ $mof_report->one_pager_attach4 }}</td>
                    <td>{{ $mof_report->mof_uploaded }}</td>
                    <td>{{ $mof_report->participation_uploaded }}</td>
                    <td>{{ $mof_report->income_report_attach6 }}</td>
                    <td>
                        <a class="btn btn-success btn-circle" href="{{ route('mof-report.edit', $mof_report->id) }}"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i
                                class="fa fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="dataTables_paginate paging_simple_numbers">
            {{$mof_reports->links()}}
        </div>
        @else
        <div class="text-center">
            <h4>No MOF and Participation Record Available</h4>
        </div>
        @endif
    </div>
</div>