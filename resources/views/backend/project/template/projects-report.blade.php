<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .report-table table {
            width: 100%;
            font-size: 16px;
            font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .report-table table,
        .report-table table th,
        .report-table table td,
        .report-table table tr {
            border: 1px solid #eaeaea;
            border-collapse: collapse;
            text-align: center;
        }

        .report-table h5 {
            background-color: #000;
            margin-bottom: 30px;
            color: #ffffff;
            text-align: center;
            font-size: 16px;
            padding: 5px;
            font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        thead {
            background-color: #000;
            color: #fff;
        }

        thead th {
            padding: 5px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #eaeaea;
        }
    </style>
</head>

<body>
    <div class="report-table">
        <h5>Activities @if(!empty($project_status)) ({{$project_status}}) @endif</h5>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>AID</th>
                    <th>MLIP</th>
                    <th>Activity Title</th>
                    <th>Accred.</th>
                    <th>Providership</th>
                    <th>JP/EP</th>
                    <th>JP/EP CR Code</th>
                    <th>RELEASE</th>
                    <th>EXPIRE</th>                   
                    <th>Type</th>                   
                    <th>PM</th>
                    <th>Last Updated</th>
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
                    <td>{{$project->activity_title}}</td>
                    <td>{{$project->accreditation_type_4_ipce}}</td>
                    <td>{{$project->providership}}</td>
                    <td>{{$provider}}</td>
                    <td>{{$cr_code}}</td>                  
                    <td>{{date('m/d/Y',strtotime($project->start_date))}}</td>
                    <td>{{date('m/d/Y',strtotime($project->expiration_date))}}</td>                 
                    <td>{{$project->activity_type}}</td>
                    <td>{{$managedby}}</td>
                    <td>{{date('m/d/Y',strtotime($project->updated_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>