  
    <div class="col-lg-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>IPCE Report</h5>               
            </div>
            <div class="ibox-content">
                 <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quarter</th>
                        <th scope="col">Total Activities</th>
                        <th scope="col">IPCE Activities</th>
                        <th scope="col">Percentage (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ipce_projects as $ipce_project)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>                            
                            <td>{{ $ipce_project->yr }} - {{ $ipce_project->qt }}</td>
                            <td>{{ $ipce_project->total_count }}</td>
                            <td>{{ $ipce_project->qtd_ipce_projects_count}} </td>
                            <td>{{ number_format(($ipce_project->qtd_ipce_projects_count / 100) * $ipce_project->total_count, 1)  }} % </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
