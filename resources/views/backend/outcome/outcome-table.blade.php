@extends('backend.layouts.master')
@section('title', 'Outcome')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Outcome</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="active">
                <strong>Outcome</strong>
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
                    <h5>Outcome Details</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox-content">     
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Exclude Comments</h5>
                                    <p class="small">
                                        {{$outcome->exclude_comments ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-4">
                                    @if(Auth::User()->role()=='ADMIN')
                                        <a href="{{ route('outcome.edit', $outcome->id) }}"
                                            class="btn btn-white btn-xs pull-right mt-5">Edit Outcome</a>
                                        @endif 
                                </div>                       
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Part Type</h5>
                                    <p class="small">
                                        {{$outcome->part_type ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Attendee Pre Count</h5>
                                    <p class="small">
                                        {{$outcome->attendee_pre_count ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Attendee Post Count</h5>
                                    <p class="small">
                                        {{$outcome->attendee_post_count ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Attendee Eval Count</h5>
                                    <p class="small">
                                        {{$outcome->attendee_eval_count ?? 'N/A'}}
                                    </p>
                                </div>  
                                <div class="col-md-2">
                                    <h5>MOC</h5>
                                    <p class="small">
                                        @if($outcome->moc==1) Yes @else No @endif
                                    </p>
                                </div>                
                                <div class="col-md-2">
                                    <h5>Include</h5>
                                    <p class="small">
                                        @if($outcome->include==1) Yes @else No @endif
                                    </p>
                                </div>                
                            </div>
                            <div class="hr-line-dashed"></div>   
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Bias</h5>
                                    <p class="small">
                                        {{$outcome->Bias ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Bias Target Min</h5>
                                    <p class="small">
                                        {{$outcome->bias_target_min ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Bias Target Met</h5>
                                    <p class="small">
                                        @if($outcome->bias_target_met==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>C Measure</h5>
                                    <p class="small">
                                        @if($outcome->c_measure==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>C Exclude</h5>
                                    <p class="small">
                                        @if($outcome->c_exclude==1) Yes @else No @endif
                                    </p>
                                </div>         
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Loif Rating</h5>
                                    <p class="small">
                                        {{$outcome->loif_rating ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Loif Target Min</h5>
                                    <p class="small">
                                        {{$outcome->loif_target_min ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>Loif Target Met</h5>
                                    <p class="small">
                                        @if($outcome->loif_target_met==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>ITC</h5>
                                    <p class="small">
                                        {{$outcome->itc ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>ITC Target Min</h5>
                                    <p class="small">
                                        {{$outcome->itc_target_min ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>ITC Target Met</h5>
                                    <p class="small">
                                        @if($outcome->itc_target_met==1) Yes @else No @endif
                                    </p>
                                </div>         
                            </div>                                                  
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>PC</h5>
                                    <p class="small">
                                        {{$outcome->pc ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>PC Target Min</h5>
                                    <p class="small">
                                        {{$outcome->pc_target_min ?? 'N/A'}}
                                    </p>
                                </div>                  
                                <div class="col-md-2">
                                    <h5>PC Target Met</h5>
                                    <p class="small">
                                        @if($outcome->pc_target_met==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>POC</h5>
                                    <p class="small">
                                        {{$outcome->poc ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>POC Target Min</h5>
                                    <p class="small">
                                        {{$outcome->poc_target_min ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>POC Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->poc_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div>         
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Comments On Competence</h5>
                                    <p class="small">
                                        {{$outcome->comments_on_competence ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>P Measure</h5>
                                    <p class="small">
                                        @if($outcome->p_measure==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>P Exclude</h5>
                                    <p class="small">
                                        @if($outcome->p_exclude==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>PIF</h5>
                                    <p class="small">
                                        {{$outcome->pif ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>PIF Target</h5>
                                    <p class="small">
                                        {{$outcome->pif_target ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>PIF Met</h5>
                                    <p class="small">
                                        @if($outcome->pif_met==1) Yes @else No @endif
                                    </p>
                                </div>         
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Comments On Performance</h5>
                                    <p class="small">
                                        {{$outcome->comments_on_performance ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>PO Measure</h5>
                                    <p class="small">
                                        @if($outcome->po_measure==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>PO Exclude</h5>
                                    <p class="small">
                                        @if($outcome->po_exclude==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>POIF</h5>
                                    <p class="small">
                                        {{$outcome->poif ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>PIF Target</h5>
                                    <p class="small">
                                        {{$outcome->pif_target ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>POIF Met</h5>
                                    <p class="small">
                                        @if($outcome->poif_met==1) Yes @else No @endif
                                    </p>
                                </div>         
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Patient Outcomes Comments</h5>
                                    <p class="small">
                                        {{$outcome->patient_outcomes_comments ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>EB Content</h5>
                                    <p class="small">
                                        {{$outcome->eb_content ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>EB Content Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->eb_content_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>Relevant Content</h5>
                                    <p class="small">
                                        {{$outcome->relevant_content ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Relevant Content Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->rel_content_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Format Useful</h5>
                                    <p class="small">
                                        {{$outcome->format_useful ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>Format Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->format_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>Faculty</h5>
                                    <p class="small">
                                        {{$outcome->faculty ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Faculty Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->faculty_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Interactive Learning</h5>
                                    <p class="small">
                                        {{$outcome->interactive_learning ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Interactive Learning Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->int_learning_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Practice Strategies</h5>
                                    <p class="small">
                                        {{$outcome->practice_strategies ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>PS Target > 95</h5>
                                    <p class="small">
                                        @if($outcome->ps_target_greater_than_95==1) Yes @else No @endif
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>Barrier Identified</h5>
                                    <p class="small">
                                        @if($outcome->barrier_identified==1) Yes @else No @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Strategies Incorporated</h5>
                                    <p class="small">
                                        @if($outcome->strategies_incorporated==1) Yes @else No @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Pre Count</h5>
                                    <p class="small">
                                        {{$outcome->pre_count ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Pre Avg</h5>
                                    <p class="small">
                                        {{$outcome->pre_avg ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Pre stdev</h5>
                                    <p class="small">
                                        {{$outcome->pre_stdev ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>Post Count</h5>
                                    <p class="small">
                                        {{$outcome->post_count ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>Post Avg</h5>
                                    <p class="small">
                                        {{$outcome->post_avg ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>Post stdev</h5>
                                    <p class="small">
                                        {{$outcome->post_stdev ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>Cohens D</h5>
                                    <p class="small">
                                        {{$outcome->cohens_d ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>Planned Impact</h5>
                                    <p class="small">
                                        {{$outcome->planned_impact ?? 'N/A'}}
                                    </p>
                                </div> 
                            </div>                                                
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Actual Impact</h5>
                                    <p class="small">
                                        {{$outcome->actual_impact ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>CCIT</h5>
                                    <p class="small">
                                        {{$outcome->ccit ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>CCIT Target</h5>
                                    <p class="small">
                                        {{$outcome->ccit_target ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-3">
                                    <h5>Role Collaborative Team Change</h5>
                                    <p class="small">
                                        {{$outcome->role_collaborative_team_change ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <h5>New Team Strategies</h5>
                                    <p class="small">
                                        {{$outcome->new_team_strategies ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Specific Action Factor</h5>
                                    <p class="small">
                                        {{$outcome->specific_action_factor ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>SAF Target</h5>
                                    <p class="small">
                                        {{$outcome->saf_target ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>ED Reach Disease</h5>
                                    <p class="small">
                                        {{$outcome->ed_reach_disease ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-2">
                                    <h5>ED Reach Per Year</h5>
                                    <p class="small">
                                        {{$outcome->ed_reach_per_year ?? 'N/A'}}
                                    </p>
                                </div> 
                                <div class="col-md-2">
                                    <h5>Understand Roles Resp</h5>
                                    <p class="small">
                                        {{$outcome->understand_roles_resp ?? 'N/A'}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <h5>Apply Tools Techniques</h5>
                                    <p class="small">
                                        {{$outcome->apply_tools_techniques ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                            
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Work Collaborative Team</h5>
                                    <p class="small">
                                        {{$outcome->work_collaborative_team ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-3">
                                    <h5>Utilize Specialists Clinical Resources</h5>
                                    <p class="small">
                                        {{$outcome->utilize_specialists_clinical_resources ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-3">
                                    <h5>Other Choice PCTG</h5>
                                    <p class="small">
                                        {{$outcome->other_choice_pctg ?? 'N/A'}}
                                    </p>
                                </div>        
                                <div class="col-md-3">
                                    <h5>Other Choice Text</h5>
                                    <p class="small">
                                        {{$outcome->other_choice_text ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
