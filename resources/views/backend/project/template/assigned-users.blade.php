<div class="ibox float-e-margins"> 
    
    <div class="ibox-title">
        <h5>Assigned Users</h5>
    </div>

    <div class="ibox-content text-center">       

        @php
        $pm = "";
        $pm_email = "#";
        if(!empty($project->managedby)){
        $pm = $project->managedby->initials;
        $pm_email = $project->managedby->email;
        }
        $as = "";
        $as_email = "#";
        if(!empty($project->assignedto)){
        $as = $project->assignedto->initials;
        $as_email = $project->assignedto->email;
        }
        $ed = "";
        $ed_email = "#";
        if(!empty($project->usedby)){
        $ed = $project->usedby->initials;
        $ed_email = $project->usedby->email;
        }
        @endphp
        <div class="row assignedUser">
            <div class="col-md-4"><label>PM: <a href="mailto:{{$pm_email}}">{{$pm}}</a></label></div>
            <div class="col-md-4"><label>AS: <a href="mailto:{{$as_email}}">{{$as}}</a></label></div>
            <div class="col-md-4"><label>ED: <a href="mailto:{{$ed_email}}">{{$ed}}</a></label></div>
        </div>      

    </div>

</div>