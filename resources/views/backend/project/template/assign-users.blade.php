@extends('backend.layouts.master')
@section('title', 'Assign Users')
@section('content')

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">


                <div class="ibox-title">
                    <h5>Assign Users</h5>
                </div>

                <div class="ibox-content">
                    @if (\Session::has('assigned_success'))
                    <div class="alert alert-success">
                        <ul class="list-style-none pl-0">
                            <li>{!! \Session::get('assigned_success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('project.assigned', $project->id)}}" method="POST">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="managed_by">Project Manager</label>
                            {!! Form::select('managed_by', $user_array['PM'], $project->managed_by, array('class' =>
                            'form-control
                            chosen-select','placeholder'=>'Select Managed By') ); !!}
                        </div>

                        <div class="form-group">
                            <label for="assigned_to">Accreditation Supervisor</label>
                            {!! Form::select('assigned_to', $user_array['DoA'], $project->assigned_to, array('class' =>
                            'form-control chosen-select','placeholder'=>'Select Assigned To') ); !!}
                        </div>

                        <div class="form-group">
                            <label for="used_by">Final Review</label>
                            {!! Form::select('used_by',$user_array['ED'], $project->used_by, array('class' =>
                            'form-control
                            chosen-select','placeholder'=>'Select Used By') ); !!}
                        </div>

                        <input type="submit" class="btn  btn-primary m-t-n-xs" value="Save">
                    </form>


                </div>

            </div>
        </div>
    </div>


</div>


@endsection