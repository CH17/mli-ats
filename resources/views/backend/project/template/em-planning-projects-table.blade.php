<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>EM Planning Activities</h5>
        </div>
        <form action="{{ route('projects.em-planning') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search by Activity ID" name="aid"
                        value="{{ $aid ?? '' }}">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search by MLIP" name="mlip"
                        value="{{ $mlip ?? '' }}">
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::select('pm', $users, $pm, [
                                'class' => 'form-control chosen-select',
                                'placeholder' => 'Select PM',
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="FilterButton">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    <div class="ClearButton">
                        <a href="{{ route('projects.em-planning') }}" class="btn btn-danger">Reset</a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <div class="ibox-content">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul class="list-style-none">
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (count($projects))
            <table class="table table-striped table-bordered table-hover table-Sorting tooltip-suggestion">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>AID</th>
                        <th>PM</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Form Ready</th>
                        <th>A1</th>
                        <th>A2a</th>
                        <th>A2b</th>
                        <th>A3</th>
                        <th>A5</th>
                        <th>CS</th>
                        <th>A7</th>
                        <th>A8</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($projects as $key => $project)
                        @php
                            $provider = '';
                            if (!empty($project->joint_provider)) {
                                $provider = $project->joint_provider->jp_code;
                            }
                            
                            $managedby = '';
                            if (!empty($project->managedby)) {
                                $managedby = $project->managedby->initials;
                            }
                            
                            
                            
                            $start_date = date('m/d/Y', strtotime($project->start_date));
                            
                            $due_date = null;
                            if (isset($project->due_date)) {
                                $due_date = date('m/d/Y', strtotime($project->due_date));
                            }
                            
                            $project_status = null;
                            if (!empty($project->project_status)) {
                                $project_status = $project->project_status->name;
                            }
                            
                           
                            $managedby = '';
                            if (!empty($project->managedby)) {
                                $managedby = $project->managedby->initials;
                            }
                            
                        @endphp
                        <tr class="gradeX">
                            <td class="text-center">{!! $key + 1 + 15 * ($projects->currentPage() - 1) !!}</td>
                            <td><a href="{{ route('project.edit', ['project' => $project->id]) }}"
                                    target="_blank">{{ $project->activity_id }}</a></td>
                            <td>{{ $managedby }}</td>
                            <td>{{ $start_date }}</td>
                            <td class="{{ $project->color_code}}">{{ $project_status }}</td>
                            <td>{{ $due_date }}</td>

                            <td>
                                @if ($project->is_ats_form_ready > 0) Y @else N  @endif
                            </td>
                            <td class="box_color_{{ $project->has_attachment_1 }}">
                                @if ($project->has_attachment_1 > 0) Y @else N  @endif
                            </td>
                            <td class="box_color_{{ $project->has_attachment_2a }}">
                                @if ($project->has_attachment_2a > 0) Y @else N  @endif
                            </td>
                            <td class="box_color_{{ $project->has_attachment_2b }}">
                                @if ($project->has_attachment_2b > 0) Y @else N  @endif
                            </td>
                            <td class="box_color_{{ $project->has_attachment_3 }}">
                                @if ($project->has_attachment_3 > 0) Y @else N @endif
                            </td>
                            <td class="box_color_{{ $project->has_attachment_5 }}">
                                @if ($project->has_attachment_5 > 0) Y @else N @endif
                            </td>
                            <td> @if ($project->has_commercial_support == 'Yes') Y @else N @endif</td>
                            <td class="box_color_{{ $project->has_attachment_7 }}">
                                @if ($project->has_attachment_7 > 0) Y @else N  @endif
                            </td>
                            <td>
                                 @if ($project->has_attachment_8 > 0) Y @else N @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="dataTables_paginate paging_simple_numbers">
                {{ $projects->appends(request()->query())->links() }}
            </div>

        @else
            <div class="text-center">
                <h4>No activity available</h4>
            </div>
        @endif


    </div>
</div>
