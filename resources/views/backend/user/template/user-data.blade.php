<div class="ibox float-e-margins">
               
        <div class="ibox-title">
            <h5>Users</h5>
        </div>

        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr >
                        <th  class="text-center">#</th> 
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                @foreach($users as $key=>$user)
                    <tr class="gradeX">
                        <td  class="text-center">{!! ($key+1)+(15*($users->currentPage()-1)) !!}</td> 
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ implode(',',$user->roles->pluck('name')->toArray())}}</td>
                        <td  class="">
                            <span class="badge @if($user->status=='active') badge-primary @endif text-capitalize">
                                {{$user->status}} 
                            </span>  
                        </td>                                
                        <td class="">
                            <a href="#">View</a>
                        </td>
                    </tr>
                @endforeach
                    
                </tbody>                            
            </table>
            <div class="dataTables_paginate paging_simple_numbers">
                {{$users->links()}}
            </div>
        </div>
    </div>