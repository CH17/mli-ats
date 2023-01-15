  
    <div class="col-lg-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Expired Activities - Not Moved to Analysis Phase</h5>              
            </div>
            <div class="ibox-content">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Activity ID</th>
                        <th scope="col">Expiration Date</th>
                        <th scope="col">EM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expired_projects as $expired_project)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            
                            <td><a href="{{route('project.edit',['project'=>$expired_project->id])}}">
                                {{ $expired_project->activity_id }}
                                </a>
                            </td>
                            <td>{{ $expired_project->expiration_date }}</td>
                            <td> @if(isset($expired_project->managedby->initials))
                        {{ $expired_project->managedby->initials }}
                        @else @endif
                    </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
