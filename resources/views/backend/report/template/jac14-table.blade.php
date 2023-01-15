@include('backend.report.template.reports-table-header')

<body>
    <div class="report-table">
        <h5>JAC 14 – Students of HP</h5>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>AID</th>
                    <th>MLIP</th>
                    <th>JP/EP CR Code</th>
                    <th>JP/EP Code</th>
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
              
                $managedby = '';
                if(!empty($project->managedby)){
                $managedby = $project->managedby->initials;
                }
                @endphp
                <tr>
                    <td>{!! ($key+1) !!}</td>
                    <td>{{$project->activity_id}}</td>
                    <td>{{$project->project_code}}</td>
                    <td>{{$cr_code}}</td>
                    <td>{{$provider}}</td>
                    <td>{{$project->activity_title}}</td>
                    <td>{{$project->jac14_description}}</td>
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