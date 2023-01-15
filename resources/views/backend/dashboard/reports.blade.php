<div class="row card-flex-col">
    @foreach ($project_status as $pro_status)
    <div class="">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <a href="{{ route('projects.index', 'status='. $pro_status->id) }}"
                    class="label label-primary pull-right">View All</a>
                <h5>{{$pro_status->name}}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$pro_status->projects_count}}</h1>
            </div>
        </div>
    </div>
    @endforeach
    <div class="">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <a href="{{ route('projects.index') }}"
                    class="label label-primary pull-right">View All</a>
                <h5>Total</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$total_projects}}</h1>
            </div>
        </div>
    </div>
</div>

<div class="row card-flex-col">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Proposed</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->proposed}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>New</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->new}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Planning</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->planning}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Ready</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->ready}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Active</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->active}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Analysis</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->analysis}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Audit</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->audit}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Approved</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->approved}}</h1>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Closed</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{$weekly_project_status->closed}}</h1>
        </div>
    </div>
    <div class="">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Total</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$weekly_project_status->total}}</h1>
            </div>
        </div>
    </div>
</div>


