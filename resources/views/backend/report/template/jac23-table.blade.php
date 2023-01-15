@include('backend.report.template.reports-table-header')

<body>
    <div class="report-table">
        <h5>JAC 23 – HCT Improvements</h5>
        <table>
            <thead>
                <tr>
                    <th>#</th>
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
                <tr>
                    <td>{!! ($key+1) !!}</td>
                    <td>{{$project->activity_id}}</td>
                    <td>{{$project->project_code}}</td>
                    <td>{{$project->jp_cr_code}}</td>
                    <td>{{$provider}}</td>
                    <td>{{$project->activity_title}}</td>
                    <td>{{$project->jac23_description}}</td>
                    <td>{{date('m/d/Y',strtotime($project->start_date))}}</td>
                    <td>{{date('m/d/Y',strtotime($project->expiration_date))}}</td>              
                    <td>{{$managedby}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>