<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>JAC 15 – Training</h5>
        </div>
        <div class="panelToolboxWrap text-right">
            <ul class="nav panel_toolbox">
                <li class="first">
                    <a href="{{ route('reports.jac-15-csv') }}" rel="tooltip" data-placement="bottom"
                        title="Download CSV">
                        <i class="fa fa-file-excel-o"></i> CSV
                    </a>
                </li>

                <li class="first">
                    <a href="{{ route('reports.jac-15-excel') }}" rel="tooltip" data-placement="bottom"
                        title="Download Excel">
                        <i class="fa fa-file-excel-o"></i> Excel
                    </a>
                </li>

                <li class="last">
                    <a href="{{ route('reports.jac-15-pdf') }}" target="_blank" rel="tooltip" data-placement="bottom"
                        title="Download PDF">
                        <i class="fa fa-file-pdf-o"></i> PDF
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div class="ibox-content">
        @if(count($jac15Reports))
        <table class="table table-striped table-bordered table-hover tooltip-suggestion">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Year/Quarter</th>
                    <th>Describe IPCE Team</th>
                    <th>CPD Needs Identified</th>
                    <th>Learning Plan Implemented based on Needs</th>
                    <th>Internal/External</th>
                    <th>Time/Resources</th>
                </tr>
            </thead>

            <tbody>
                @foreach($jac15Reports as $key=>$jac15Report)            
                <tr class="gradeX">
                    <td class="text-center">{{ ($key+1)+(15*($jac15Reports->currentPage()-1)) }}</td>
                    <td>{{$jac15Report->year_quarter}}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $jac15Report->ipce_team }}">
                        {{Str::words($jac15Report->ipce_team, 4,' ....') }}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $jac15Report->cpd_need }}">
                        {{Str::words($jac15Report->cpd_need, 4,' ....') }}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $jac15Report->learning_plan }}">
                        {{Str::words($jac15Report->learning_plan, 4,' ....') }}</td>
                    <td>{{$jac15Report->int_ext}}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $jac15Report->time_resources }}">
                        {{Str::words($jac15Report->time_resources, 4,' ....') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="dataTables_paginate paging_simple_numbers">
            {{$jac15Reports->links()}}
        </div>

        @else
        <div class="text-center">
            <h4>No activity available</h4>
        </div>
        @endif
    </div>
</div>
