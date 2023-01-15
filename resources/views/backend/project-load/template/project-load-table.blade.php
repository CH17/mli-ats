<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Activity Load</h5>
            <div class="clear"></div>
            <form action="{{ route('projects.load') }}" method="GET">
                <div class="row">
                    <div class="form-group col-md-3">
                        <div class="checkbox checkbox-primary">
                            <input class="form-check-input" type="checkbox" name="role[]" value="PM" @if(in_array("PM", $role)) checked @endif>
                            <label class="form-check-label" for="pm">PM</label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="checkbox checkbox-primary">
                            <input class="form-check-input" type="checkbox" name="role[]" value="ED" @if(in_array("ED", $role)) checked @endif>
                            <label class="form-check-label" for="pm">ED</label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="checkbox checkbox-primary">
                            <input class="form-check-input" type="checkbox" name="role[]" value="DoA" @if(in_array("DoA", $role)) checked @endif>
                            <label class="form-check-label" for="pm">DoA</label>
                        </div>
                    </div>                    
                    <div class="col-md-3 ActivityLoadFilter">
                        <span>
                            <button type="submit" class="btn btn-primary">Filter</button>                        
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="ibox-content">
        @if(count($users))
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Proposed</th>
                    <th>New</th>
                    <th>Planning</th>
                    <th>Ready</th>
                    <th>Active</th>
                    <th>Analysis</th>
                    <th>Audit</th>
                    <th>Approved</th>
                    <th>Total</th>
                    <th>Percentage</th>
                    <th>Closed</th>
                </tr>
            </thead>

            <tbody>


                @foreach($users as $key=>$user)

                @php
                $project_user_count = $user->project_user_count;

                $project_user_count_rate = 0;
                if($total_user_projects > 0){
                $project_user_count_rate = number_format(($project_user_count * 100)/$total_user_projects, 2);
                }
                @endphp
                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($users->currentPage()-1)) !!}</td>
                    <td>{{$user->name}} ({{$user->role()}})</td>
                    <td>{{ $user->proposed }}</td>
                    <td>{{ $user->new }}</td>
                    <td>{{ $user->planning }}</td>
                    <td>{{ $user->ready }}</td>
                    <td>{{ $user->active }}</td>
                    <td>{{ $user->analysis }}</td>
                    <td>{{ $user->audit }}</td>
                    <td>{{ $user->approved }}</td>
                    <td>{{ $user->project_user_count }}</td>
                    <td>{{$project_user_count_rate}} %</td>
                    <td>{{ $user->closed }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th>{{$total_proposed}}</th>
                    <th>{{$total_new}}</th>
                    <th>{{$total_planning}}</th>
                    <th>{{$total_ready}}</th>
                    <th>{{$total_active}}</th>
                    <th>{{$total_analysis}}</th>
                    <th>{{$total_audit}}</th>
                    <th>{{$total_approved}}</th>
                    <th>{{$total_user_projects}}</th>
                    <th></th>
                    <th>{{$total_closed}}</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Percentage</th>
                    <th>{{$propose_rate}} %</th>
                    <th>{{$new_rate}} %</th>
                    <th>{{$planning_rate}} %</th>
                    <th>{{$ready_rate}} %</th>
                    <th>{{$active_rate}} %</th>
                    <th>{{$analysis_rate}} %</th>
                    <th>{{$audit_rate}} %</th>
                    <th>{{$approved_rate}} %</th>
                    <th></th>
                    <th></th>
                    <th>{{$closed_rate}} %</th>
                </tr>
            </tfoot>
        </table>
        <div class="dataTables_paginate paging_simple_numbers">
            {{$users->links()}}
        </div>
        @else
        <div class="text-center">
            <h4>No User available</h4>
        </div>
        @endif
    </div>
</div>