<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Expired Activities</h5>
        </div>
        <div class="panelToolboxWrap text-right tooltip-suggestion">
            <ul class="nav panel_toolbox">
                <li class="first">
                    <a href="{{ route('reports.expired-activity-csv') }}" data-toggle="tooltip" data-placement="top" title="Download CSV">
                        <i class="fa fa-file-excel-o"></i> CSV
                    </a>
                </li>

                 <li class="first">
                    <a href="{{ route('reports.expired-activity-excel') }}" data-toggle="tooltip" data-placement="top" title="Download Excel">
                        <i class="fa fa-file-excel-o"></i> Excel
                    </a>
                </li>
                
                <li class="last">
                    <a href="{{ route('reports.expired-activity-pdf') }}" target="_blank" data-toggle="tooltip"
                        data-placement="top" title="Download PDF">
                        <i class="fa fa-file-pdf-o"></i> PDF
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div class="ibox-content">
        @if(count($projects) > 0)
        <table class="table table-striped table-bordered table-hover table-Sorting tooltip-suggestion">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="sorting">
                        <div><a href="?order_by=activity_id&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i>
                                AID</a></div>
                    </th>
                    <th class="sorting">
                        <div><a href="?order_by=project_code&sort_order={{$next_order}}"><i
                                    class="fa fa-fw fa-sort"></i> MLIP</a></div>
                    </th>
                    <th class="sorting">
                        <div><a href="?order_by=jp_cr_code&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i>
                                JP/EP CR Code</a></div>
                    </th>
                    <th>JP/EP Code</th>
                    <th class="sorting">
                        <div><a href="?order_by=activity_title&sort_order={{$next_order}}"><i
                                    class="fa fa-fw fa-sort"></i> Activity Title</a></div>
                    </th>
                    <th>Type </th>
                     <th>Accred. </th>
                    <th class="sorting">
                        <div><a href="?order_by=start_date&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i>
                                RELEASE</a></div>
                    </th>
                    <th class="sorting">
                        <div><a href="?order_by=expiration_date&sort_order={{$next_order}}"><i
                                    class="fa fa-fw fa-sort"></i> EXPIRE</a></div>
                    </th>
                    <th class="sorting">
                        <div><a href="?order_by=expiration_date&sort_order={{$next_order}}"><i
                                    class="fa fa-fw fa-sort"></i> Days Expired</a></div>
                    </th>
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

                 if(!empty($project->educational_partner_1)){
                    
                    if(!empty($provider))  { $provider .= ' / '; }
                    
                    $provider .= $project->educational_partner_1->ep_code;
                }

                $cr_code = '';

                if(!empty($project->jp_cr_code)){
                    $cr_code = $project->jp_cr_code;
                }

                 if(!empty($project->ep_cr_code_1)){
                    
                    if(!empty($cr_code))  { $cr_code .= ' / '; }
                    
                    $cr_code .= $project->ep_cr_code_1;
                }

                $expired_in_days = '';
                if(!empty($project->expiration_date)){
                $expiration_date = Carbon\Carbon::parse($project->expiration_date);
                $expired_in_days = $expiration_date->diffInDays(today());
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
                    <td>{{$cr_code}}</td>
                    <td>{{$provider}}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{!! $project->activity_title !!}">{!!
                        Str::words($project->activity_title, 4,' ....') !!}</td>
                    <td>{{$project->activity_type}}</td>
                    <td>{{$project->accreditation_type_4_ipce}}</td>
                    <td>{{date('m/d/Y',strtotime($project->start_date))}}</td>
                    <td>{{date('m/d/Y',strtotime($project->expiration_date))}}</td>
                    <td>{{$expired_in_days}} days ago</td>
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