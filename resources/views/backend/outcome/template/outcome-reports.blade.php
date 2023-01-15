<div class="ibox float-e-margins outcome">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Select an activity for Outcome Report</h5>
        </div>
    </div>
    <div class="ibox-content EditOutcome">
        <div class="row">
            <div class="col-md-12">
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <ul class="list-style-none">
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
                <form action="{{ route('outcome.index') }}" method="GET">
                    <div class="form-group col-md-6">
                        <label for="project_id">Select Activity</label>
                        {!! Form::select('project_id',$projects , request()->project_id, array('class' => 'form-control
                        chosen-select','placeholder'=>'Select Activity') ); !!}
                    </div>
                    <div class="col-md-6 Filter">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('outcome.index') }}" class="btn btn-danger">Reset</a>
                    </div>
                </form>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>

@if(!empty($project))
<div id="Activity-Details">
    <div class="ibox float-e-margins outcome">
        <div class="ibox-title">
            <div class="titleWrap">
                <h5>Activity Information</h5>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-b-md">

                        <h4>{{$project->activity_title}} @if(!empty($project->project_status)) <span
                                class="label label-primary va-mddle">{{$project->project_status->name}}</span> @endif
                        </h4>
                    </div>

                </div>
            </div>
            @php
            $provider = '';
            if(!empty($project->joint_provider)){
            $provider = $project->joint_provider->jp_code;
            }
            @endphp
            <div class="row">
                <div class="col-md-8">
                    <dl class="dl-horizontal left">
                        <dt>Activity ID:</dt>
                        <dd>{{$project->activity_id}}</dd>
                        <dt>Project ID:</dt>
                        @if(!empty($project->project_code))
                        <dd>{{$project->project_code}}</dd>
                        @else
                        <dd>N/A</dd>
                        @endif
                        <dt>Provider:</dt>
                        @if(!empty($provider))
                        <dd>{{$provider}}</dd>
                        @else
                        <dd>N/A</dd>
                        @endif
                        <dt>Activity Type:</dt>
                        @if(!empty($project->activity_type))
                        <dd>{{$project->activity_type}}</dd>
                        @else
                        <dd>N/A</dd>
                        @endif
                        @if(!empty($project->providership))
                        <dt>Activity Overview:</dt>
                        <dd>{{$project->providership}}</dd>
                        @endif
                        <dt>Commercial Support Received:</dt>
                        @if(!empty($project->has_commercial_support))
                        <dd>{{$project->has_commercial_support}} </dd>
                        @else
                        <dd>N/A</dd>
                        @endif
                    </dl>
                </div>

                <div class="col-md-4" id="cluster_info">
                    <dl class="dl-horizontal">
                        <dt>Start Date:</dt>
                        <dd>{{date('Y-m-d',strtotime($project->start_date))}}</dd>
                        <dt>Expiration Date:</dt>
                        <dd>{{date('Y-m-d',strtotime($project->expiration_date))}}</dd>
                        <dt>Last Updated:</dt>
                        <dd>{{date('Y-m-d',strtotime($project->updated_at))}}</dd>
                        <dt>Created:</dt>
                        <dd> {{date('Y-m-d',strtotime($project->created_at))}} </dd>
                    </dl>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Outcomes</h5>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox-content">
                        @if(count($outcomes))
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>                                   
                                    <th>Exclude Comments</th>
                                    <th>Part Type</th>
                                    <th>MOC</th>
                                    <th>Attendee Pre Count</th>
                                    <th>Attendee Post Count</th>
                                    <th>Attendee Eval Count</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($outcomes as $key=>$outcome)
                                @php
                                $moc = $outcome->moc==1 ? 'Yes' : 'No'
                                @endphp
                                <tr class="gradeX">
                                    <td class="text-center">{!! ($key+1)+(15*($outcomes->currentPage()-1)) !!}</td>                         
                                    <td>{{$outcome->exclude_comments}}</td>
                                    <td>{{$outcome->part_type}}</td>                                    
                                    <td>{{  $moc  }}</td>
                                    <td>{{$outcome->attendee_pre_count}}</td>
                                    <td>{{$outcome->attendee_post_count}}</td>
                                    <td>{{$outcome->attendee_eval_count}}</td>
                                    <td class="action-column tooltip-suggestion">
                                        <a class="btn btn-success btn-circle"
                                            href="{{ route('outcome.show', $outcome->id) }}" data-toggle="tooltip"
                                            data-placement="top" title="View"><i class="fa fa-link"></i></a>
                                        <a class="btn btn-success btn-circle"
                                            href="{{ route('outcome.edit', $outcome->id) }}" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers">
                            {{$outcomes->links()}}
                        </div>
                        @else
                        <div class="text-center">
                            <h4>No outcome avaiable</h4>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
