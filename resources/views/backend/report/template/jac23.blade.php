<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>JAC 23 – HCT Improvements</h5>
        </div>
        <div class="panelToolboxWrap text-right">
            <ul class="nav panel_toolbox">
                <li class="first">
                    <a href="{{ route('reports.jac-23-csv') }}"
                        rel="tooltip" data-placement="bottom" title="Download CSV">
                        <i class="fa fa-file-excel-o"></i> CSV
                    </a>
                </li>      

                <li class="first">
                    <a href="{{ route('reports.jac-23-excel') }}"
                        rel="tooltip" data-placement="bottom" title="Download Excel">
                        <i class="fa fa-file-excel-o"></i> Excel
                    </a>
                </li>      
                            
                <li class="last">
                    <a href="{{ route('reports.jac-23-pdf') }}"
                        target="_blank" rel="tooltip" data-placement="bottom" title="Download PDF">
                        <i class="fa fa-file-pdf-o"></i> PDF
                    </a>
                </li>            
            </ul>
        </div>
        <div class="clear"></div>
    </div>    

    <div class="ibox-content">
        @if(count($projects) > 0)
        <table class="table table-striped table-bordered table-hover tooltip-suggestion">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>AID</th>
                    <th>MLIP</th>
                    <th>JP CR Code</th>
                    <th>JP Code</th>
                    <th>Activity Title</th>
                    <th>Memo</th>
                    <th>RELEASE</th>
                    <th>EXPIRE</th>                 
                    <th>PM</th>

                </tr>
            </thead>

            <tbody>
                @foreach($projects as $key=>$project)
                @php
                $provider = '';
                if(!empty($project->joint_provider)){
                $provider = $project->joint_provider->jp_code;
                }                

                $managedby = '';
                if(!empty($project->managedby)){
                $managedby = $project->managedby->initials;
                }
                @endphp
                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($projects->currentPage()-1)) !!}</td>
                    <td>{{$project->activity_id}}</td>
                    <td>{{$project->project_code}}</td>
                    <td>{{$project->jp_cr_code}}</td>
                    <td>{{$provider}}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{!! $project->activity_title !!}">{!!
                        Str::words($project->activity_title, 4,' ....') !!}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{!! $project->jac23_description !!}">{!!
                        Str::words($project->jac23_description, 4,' ....') !!}</td>
                    <td>{{date('m/d/Y',strtotime($project->start_date))}}</td>
                    <td>{{date('m/d/Y',strtotime($project->expiration_date))}}</td>                    
                    <td>{{$managedby}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="dataTables_paginate paging_simple_numbers">
            {{$projects->links()}}
        </div>

        @else
        <div class="text-center">
            <h4>No activity available</h4>
        </div>
        @endif
    </div>
</div>