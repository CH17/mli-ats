@extends('backend.layouts.master')
@section('title', 'Activity')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Activity</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}">Activities</a>
                </li>
                <li class="active">
                    <strong>Edit Activity</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-9 edit-activity">

                <div class="tabs-container">
                    @include('backend.project.template.edit-template.edit-menu', ['active' => 'info'])

                    <div class="tab-content">
                        <div class="tab-pane active">
                            @include('backend.project.template.edit-template.items.provider-form')
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                @include('backend.project.template.change-status')
                @if (!empty($user_role) && ($user_role == 'ADMIN' || $user_role == 'DoA'))
                    @include('backend.project.template.force-status-change')
                @endif
                @if ((!empty($user_role) && $user_role == 'ADMIN') || $user_role == 'ED')
                    @include('backend.project.template.assign-users-form')
                @endif
                @include('backend.project.template.assigned-users')
                @include('backend.project.template.related-documents')
                @include('backend.project.template.notes')
            </div>

        </div>


    </div>

@endsection
