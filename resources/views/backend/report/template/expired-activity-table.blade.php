@include('backend.report.template.reports-table-header')

<body>
    <div class="report-table">
        <h5>Expired Activities</h5>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>AID</th>
                    <th>MLIP</th>
                    <th>JP CR Code</th>
                    <th>JP Code</th>
                    <th>Activity Title</th>
                    <th>Type </th>
                    <th>Accred. </th>
                    <th>RELEASE</th>
                    <th>EXPIRE</th>
                    <th>Days Expired</th>
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
                <tr>
                    <td>{!! ($key+1) !!}</td>
                    <td>{{$project->activity_id}}</td>
                    <td>{{$project->project_code}}</td>
                    <td>{{$project->jp_cr_code}}</td>
                    <td>{{$provider}}</td>
                    <td>{{$project->activity_title}}</td>
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
    </div>
</body>

</html>