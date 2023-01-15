<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Unassigned Activities</h5>
        </div>
        <form action="{{ route('projects.unassigned') }}" method="GET">
            <div class="row">
                <div class="col-md-8">                    
                    <input type="text" class="form-control"
                            placeholder="Search by Activity ID, MLIP, Activity Title or JP CR Code...." name="q"
                            value="{{ $filter ?? '' }}">
                </div>
                <div class="col-md-2">
                    <div class="form-group">                       
                        {!! Form::select('pm', $users , $pm, array('class' => 'form-control
                        chosen-select','placeholder'=>'Select PM') ); !!}                        
                    </div>                    
                </div>  
                <div class="col-md-2">
                    <div class="FilterButton">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>  
                    <div class="ClearButton">
                        <a href="{{ route('projects.index') }}" class="btn btn-danger">Reset</a>
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
        @if(count($projects))
        <table class="table table-striped table-bordered table-hover table-Sorting tooltip-suggestion">
            <thead>
                <tr>
                    <th class="text-center">#</th>                     
                    <th class="sorting"><div><a href="?order_by=activity_id&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> AID</a></div></th>                    
                    <th class="sorting"><div><a href="?order_by=project_code&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> MLIP</a></div></th>
                    <th class="sorting"><div><a href="?order_by=activity_title&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> Activity Title</a></div></th>
                    <th>Providership</th>
                    <th>JP</th>
                    <th class="sorting"><div><a href="?order_by=jp_cr_code&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> JP CR Code</a></div></th>
                    <th class="sorting"><div><a href="?order_by=start_date&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> RELEASE</a></div></th>
                    <th class="sorting"><div><a href="?order_by=expiration_date&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> EXPIRE</a></div></th>
                    <th class="sorting"><div><a href="?order_by=activity_type&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> Type</a></div></th>
                    <th>PM</th>
                    <th class="sorting"><div><a href="?order_by=updated_at&sort_order={{$next_order}}"><i class="fa fa-fw fa-sort"></i> Last Updated</a></div></th>
                    <th>Action</th>
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
                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($projects->currentPage()-1)) !!}</td>
                    <td>{{$project->activity_id}}</td>
                    <td>{{$project->project_code}}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{!! $project->activity_title !!}">{!! Str::words($project->activity_title, 2,' ....')  !!}
                        @if(!empty($project->project_status))
                        <span class="badge badge-primary text-capitalize">
                            {{$project->project_status->name}}
                        </span>
                        @endif
                    </td>
                    <td>{{$project->providership}}</td>
                    <td>{{$provider}}</td>
                    <td>{{$project->jp_cr_code}}</td>
                    <td>{{date('m/d/Y',strtotime($project->start_date))}}</td>
                    <td>{{date('m/d/Y',strtotime($project->expiration_date))}}</td>
                    <td data-toggle="tooltip" data-placement="top" title="{!! $project->activity_type !!}">{!! Str::words($project->activity_type, 2,' ....')  !!}</td>
                    <td>{{$managedby}}</td>
                    <td>{{date('m/d/Y',strtotime($project->updated_at))}}</td>
                    <td class="project-action-column">
                        <a class="btn btn-success btn-circle" href="{{route('project.show',['project'=>$project->id])}}"
                            data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-link"></i></a>

                        @if(!empty($user_role) && ($user_role=='ADMIN' || $user_role=='ED'))                       
                        
                        <a class="btn btn-success btn-circle" href="{{route('project.edit',['project'=>$project->id])}}"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i
                                class="fa fa-edit"></i></a>
                        @endif
                        <a class="btn btn-success btn-circle" href="{{route('project.assign',['project'=>$project->id])}}"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign User"><i
                                class="fa fa-user-plus"></i></a>
                        @if(!empty($user_role) && ($user_role=='ADMIN' || $user_role=='ED'))     
                        <form method="POST" action="{{route('project.delete',$project->id)}}" class="action-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-circle deleteConfirmmation"
                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                    class="fa fa-trash"></i></button>
                        </form>                        
                        @endif
                        <form method="POST" action="{{route('project.clone',$project->id)}}" class="action-form">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary btn-circle" data-toggle="tooltip"
                                data-placement="top" title="Clone"><i class="fa fa-copy"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>




        <div class="dataTables_paginate paging_simple_numbers">
            {{$projects->appends(request()->query())->links()}}
        </div>

        @else
        <div class="text-center">
            <h4>No activity available</h4>
        </div>
        @endif


    </div>
</div>