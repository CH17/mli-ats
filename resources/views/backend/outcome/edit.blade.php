@extends('backend.layouts.master')
@section('title', 'Edit Outcome')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Outcome</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="active">
                <strong>Edit Outcome</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Outcome</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox-content">
                            @if(\Session::has('success'))
                            <div class="alert alert-success">
                                <ul class="list-style-none">
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('outcome.update', $outcome->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exclude_comments">Exclude Comments</label>
                                            <input type="text" name="exclude_comments" id="exclude_comments"
                                                value="{{$outcome->exclude_comments}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="part_type">Part Type</label>
                                            <input type="text" name="part_type" id="part_type"
                                                value="{{$outcome->part_type}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="attendee_pre_count">Attendee Pre Count</label>
                                            <input type="text" name="attendee_pre_count" id="attendee_pre_count"
                                                value="{{$outcome->attendee_pre_count}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="attendee_post_count">Attendee Post Count</label>
                                            <input type="text" name="attendee_post_count" id="attendee_post_count"
                                                value="{{$outcome->attendee_post_count}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="attendee_eval_count">Attendee Eval Count</label>
                                            <input type="text" name="attendee_eval_count" id="attendee_eval_count"
                                                value="{{$outcome->attendee_eval_count}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="moc">MOC</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input has_jp_2_edit" type="radio"
                                                        name="moc" value="1" @if($outcome->moc==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="moc">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input has_jp_2_edit" type="radio"
                                                        name="moc" value="0" @if($outcome->moc==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="moc">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="include">Include</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input has_jp_2_edit" type="radio"
                                                        name="include" value="1" @if($outcome->include==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="include">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input has_jp_2_edit" type="radio"
                                                        name="include" value="0" @if($outcome->include==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="include">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="bias">Bias</label>
                                            <input type="text" name="bias" value="{{$outcome->bias}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="bias_target_min">Bias Target Min</label>
                                            <input type="text" name="bias_target_min"
                                                value="{{$outcome->bias_target_min}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="bias_target_met">Bias Target Met</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="bias_target_met"
                                                        value="1" @if($outcome->bias_target_met==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="bias_target_met">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="bias_target_met"
                                                        value="0" @if($outcome->bias_target_met==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="bias_target_met">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="c_measure">C Measure</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="c_measure"
                                                        value="1" @if($outcome->c_measure==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="c_measure">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="c_measure"
                                                        value="0" @if($outcome->c_measure==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="c_measure">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="c_exclude">C Exclude</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="c_exclude"
                                                        value="1" @if($outcome->c_exclude==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="c_exclude">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="c_exclude"
                                                        value="0" @if($outcome->c_exclude==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="c_exclude">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="loif_rating">Loif Rating</label>
                                            <input type="text" name="loif_rating" value="{{$outcome->loif_rating}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="loif_target_min">Loif Target Min</label>
                                            <input type="text" name="loif_target_min"
                                                value="{{$outcome->loif_target_min}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="loif_target_met">Loif Target Met</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="loif_target_met"
                                                        value="1" @if($outcome->loif_target_met==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="loif_target_met">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="loif_target_met"
                                                        value="0" @if($outcome->loif_target_met==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="c_exclude">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="itc">ITC</label>
                                            <input type="text" name="itc" value="{{$outcome->itc}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="itc_target_min">ITC Target Min</label>
                                            <input type="text" name="itc_target_min"
                                                value="{{$outcome->itc_target_min}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="itc_target_met">ITC Target Met</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="itc_target_met"
                                                        value="1" @if($outcome->itc_target_met==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="itc_target_met">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="itc_target_met"
                                                        value="0" @if($outcome->itc_target_met==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="c_exclude">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pc">PC</label>
                                            <input type="text" name="pc" value="{{$outcome->pc}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pc_target_min">PC Target Min</label>
                                            <input type="text" name="pc_target_min" value="{{$outcome->pc_target_min}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="pc_target_met">PC Target Met</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="pc_target_met"
                                                        value="1" @if($outcome->pc_target_met==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="pc_target_met">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="pc_target_met"
                                                        value="0" @if($outcome->pc_target_met==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="pc_target_met">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="poc">POC</label>
                                            <input type="text" name="poc" value="{{$outcome->poc}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="poc_target_min">POC Target Min</label>
                                            <input type="text" name="poc_target_min"
                                                value="{{$outcome->poc_target_min}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="poc_target_greater_than_95">POC Target > 95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="poc_target_greater_than_95" value="1"
                                                        @if($outcome->poc_target_greater_than_95==1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="poc_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="poc_target_greater_than_95" value="0"
                                                        @if($outcome->poc_target_greater_than_95==0) checked @endif>
                                                    <label class="form-check-label"
                                                        for="poc_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="comments_on_competence">Comments On Competence</label>
                                            <input type="text" name="comments_on_competence"
                                                value="{{$outcome->comments_on_competence}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="p_measure">P Measure</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="p_measure"
                                                        value="1" @if($outcome->p_measure==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="p_measure">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="p_measure"
                                                        value="0" @if($outcome->p_measure==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="p_measure">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="p_exclude">P Exclude</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="p_exclude"
                                                        value="1" @if($outcome->p_exclude==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="p_exclude">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="p_exclude"
                                                        value="0" @if($outcome->p_exclude==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="p_exclude">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pif">PIF</label>
                                            <input type="text" name="pif" value="{{$outcome->pif}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pif_target">PIF Target</label>
                                            <input type="text" name="pif_target" value="{{$outcome->pif_target}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="pif_met">PIF Met</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="pif_met"
                                                        value="1" @if($outcome->pif_met==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="pif_met">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="pif_met"
                                                        value="0" @if($outcome->pif_met==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="pif_met">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="comments_on_performance">Comments On Performance</label>
                                            <input type="text" name="comments_on_performance"
                                                value="{{$outcome->comments_on_performance}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="po_measure">PO Measure</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="po_measure"
                                                        value="1" @if($outcome->po_measure==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="po_measure">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="po_measure"
                                                        value="0" @if($outcome->po_measure==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="po_measure">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="po_exclude">PO Exclude</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="po_exclude"
                                                        value="1" @if($outcome->po_exclude==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="po_exclude">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="po_exclude"
                                                        value="0" @if($outcome->po_exclude==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="po_exclude">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="poif">POIF</label>
                                            <input type="text" name="poif" value="{{$outcome->poif}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="poif_target">POIF Target</label>
                                            <input type="text" name="poif_target" value="{{$outcome->poif_target}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="poif_met">POIF Met</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="poif_met"
                                                        value="1" @if($outcome->poif_met==1) checked
                                                    @endif>
                                                    <label class="form-check-label" for="poif_met">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio" name="poif_met"
                                                        value="0" @if($outcome->poif_met==0) checked
                                                    @endif>
                                                    <label class="form-check-label" for="poif_met">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="patient_outcomes_comments">Patient Outcomes Comments</label>
                                            <input type="text" name="patient_outcomes_comments"
                                                value="{{$outcome->patient_outcomes_comments}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="eb_content">EB Content</label>
                                            <input type="text" name="eb_content" value="{{$outcome->eb_content}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="eb_content_target_greater_than_95">EB Content Target > 95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="eb_content_target_greater_than_95" value="1"
                                                        @if($outcome->eb_content_target_greater_than_95==1) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="eb_content_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="eb_content_target_greater_than_95" value="0"
                                                        @if($outcome->eb_content_target_greater_than_95==0) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="eb_content_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="relevant_content">Relevant Content</label>
                                            <input type="text" name="relevant_content"
                                                value="{{$outcome->relevant_content}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="rel_content_target_greater_than_95">Relevant Content Target >
                                            95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="rel_content_target_greater_than_95" value="1"
                                                        @if($outcome->rel_content_target_greater_than_95==1) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="eb_content_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="rel_content_target_greater_than_95" value="0"
                                                        @if($outcome->rel_content_target_greater_than_95==0) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="rel_content_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="format_useful">Format Useful</label>
                                            <input type="text" name="format_useful" value="{{$outcome->format_useful}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="format_target_greater_than_95">Format Target > 95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="format_target_greater_than_95" value="1"
                                                        @if($outcome->format_target_greater_than_95==1) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="format_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="format_target_greater_than_95" value="0"
                                                        @if($outcome->format_target_greater_than_95==0) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="format_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="faculty">Faculty</label>
                                            <input type="text" name="faculty" value="{{$outcome->faculty}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="faculty_target_greater_than_95">Faculty Target > 95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="faculty_target_greater_than_95" value="1"
                                                        @if($outcome->faculty_target_greater_than_95==1) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="faculty_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="faculty_target_greater_than_95" value="0"
                                                        @if($outcome->faculty_target_greater_than_95==0) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="faculty_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="interactive_learning">Interactive Learning</label>
                                            <input type="text" name="interactive_learning"
                                                value="{{$outcome->interactive_learning}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="int_learning_target_greater_than_95">Interactive Learning Target >
                                            95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="int_learning_target_greater_than_95" value="1"
                                                        @if($outcome->int_learning_target_greater_than_95==1) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="int_learning_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="int_learning_target_greater_than_95" value="0"
                                                        @if($outcome->int_learning_target_greater_than_95==0) checked
                                                    @endif>
                                                    <label class="form-check-label"
                                                        for="int_learning_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="practice_strategies">Practice Strategies</label>
                                            <input type="text" name="practice_strategies"
                                                value="{{$outcome->practice_strategies}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ps_target_greater_than_95">PS Target > 95</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="ps_target_greater_than_95" value="1"
                                                        @if($outcome->ps_target_greater_than_95==1) checked @endif>
                                                    <label class="form-check-label" for="ps_target_greater_than_95">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="ps_target_greater_than_95" value="0"
                                                        @if($outcome->ps_target_greater_than_95==0) checked @endif>
                                                    <label class="form-check-label" for="ps_target_greater_than_95">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="barrier_identified">Barrier Identified</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="barrier_identified" value="1"
                                                        @if($outcome->barrier_identified==1) checked @endif>
                                                    <label class="form-check-label" for="barrier_identified">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="barrier_identified" value="0"
                                                        @if($outcome->barrier_identified==0) checked @endif>
                                                    <label class="form-check-label" for="barrier_identified">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="strategies_incorporated">Strategies Incorporated</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="strategies_incorporated" value="1"
                                                        @if($outcome->strategies_incorporated==1) checked @endif>
                                                    <label class="form-check-label" for="strategies_incorporated">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio radio-primary">
                                                    <input class="form-check-input" type="radio"
                                                        name="strategies_incorporated" value="0"
                                                        @if($outcome->strategies_incorporated==0) checked @endif>
                                                    <label class="form-check-label" for="strategies_incorporated">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pre_count">Pre Count</label>
                                            <input type="text" name="pre_count"
                                                value="{{$outcome->pre_count}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pre_avg">Pre Avg</label>
                                            <input type="text" name="pre_avg"
                                                value="{{$outcome->pre_avg}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pre_stdev">Pre stdev</label>
                                            <input type="text" name="pre_stdev"
                                                value="{{$outcome->pre_stdev}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="post_count">Post Count</label>
                                            <input type="text" name="post_count"
                                                value="{{$outcome->post_count}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="post_avg">Post Avg</label>
                                            <input type="text" name="post_avg"
                                                value="{{$outcome->post_avg}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="post_stdev">Post stdev</label>
                                            <input type="text" name="post_stdev"
                                                value="{{$outcome->post_stdev}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cohens_d">Cohens D</label>
                                            <input type="text" name="cohens_d"
                                                value="{{$outcome->cohens_d}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="planned_impact">Planned Impact</label>
                                            <input type="text" name="planned_impact"
                                                value="{{$outcome->planned_impact}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="actual_impact">Actual Impact</label>
                                            <input type="text" name="actual_impact"
                                                value="{{$outcome->actual_impact}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ccit">CCIT</label>
                                            <input type="text" name="ccit"
                                                value="{{$outcome->ccit}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ccit_target">CCIT Target</label>
                                            <input type="text" name="ccit_target"
                                                value="{{$outcome->ccit_target}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="role_collaborative_team_change">Role Collaborative Team Change</label>
                                            <input type="text" name="role_collaborative_team_change"
                                                value="{{$outcome->role_collaborative_team_change}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="new_team_strategies">New Team Strategies</label>
                                            <input type="text" name="new_team_strategies"
                                                value="{{$outcome->new_team_strategies}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="specific_action_factor">Specific Action Factor</label>
                                            <input type="text" name="specific_action_factor"
                                                value="{{$outcome->specific_action_factor}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="saf_target">SAF Target</label>
                                            <input type="text" name="saf_target"
                                                value="{{$outcome->saf_target}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ed_reach_disease">ED Reach Disease</label>
                                            <input type="text" name="ed_reach_disease"
                                                value="{{$outcome->ed_reach_disease}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ed_reach_per_year">ED Reach Per Year</label>
                                            <input type="text" name="ed_reach_per_year"
                                                value="{{$outcome->ed_reach_per_year}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="understand_roles_resp">Understand Roles Resp</label>
                                            <input type="text" name="understand_roles_resp"
                                                value="{{$outcome->understand_roles_resp}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="apply_tools_techniques">Apply Tools Techniques</label>
                                            <input type="text" name="apply_tools_techniques"
                                                value="{{$outcome->apply_tools_techniques}}" class="form-control">
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="work_collaborative_team">Work Collaborative Team</label>
                                            <input type="text" name="work_collaborative_team"
                                                value="{{$outcome->work_collaborative_team}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="utilize_specialists_clinical_resources">Utilize Specialists Clinical Resources</label>
                                            <input type="text" name="utilize_specialists_clinical_resources"
                                                value="{{$outcome->utilize_specialists_clinical_resources}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="other_choice_pctg">Other Choice PCTG</label>
                                            <input type="text" name="other_choice_pctg"
                                                value="{{$outcome->other_choice_pctg}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="other_choice_text">Other Choice Text</label>
                                            <input type="text" name="other_choice_text"
                                                value="{{$outcome->other_choice_text}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="name" class="display-block">&nbsp;</label>
                                            <input type="submit" class="btn btn-primary" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
