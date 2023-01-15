<div id="activity-participant-content">
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
                            class="label label-primary va-mddle">{{$project->project_status->name}}</span> @endif</h4>
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