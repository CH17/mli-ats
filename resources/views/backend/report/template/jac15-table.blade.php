@include('backend.report.template.reports-table-header')

<body>
    <div class="report-table">
        <h5>JAC 14 – Training</h5>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Year/Quarter</th>
                    <th>Describe IPCE Team</th>
                    <th>CPD Needs Identified</th>
                    <th>Learning Plan Implemented based on Needs</th>
                    <th>Internal/External</th>
                    <th>Time/Resources</th>

                </tr>
            </thead>

            <tbody>
                @foreach($jac15Reports as $key=>$jac15Report)
                <tr>
                    <td>{!! ($key+1) !!}</td>                   
                    <td>{{ $jac15Report->year_quarter }}</td>
                    <td>{{ $jac15Report->ipce_team }}</td>
                    <td>{{ $jac15Report->cpd_need }}</td>
                    <td>{{ $jac15Report->learning_plan }}</td>
                    <td>{{ $jac15Report->int_ext }}</td>
                    <td>{{ $jac15Report->time_resources }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
