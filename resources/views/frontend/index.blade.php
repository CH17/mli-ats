@extends('frontend.layouts.master')

@section('content')

<section class="col-wrap content_pt content_pb">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center p-5">
                <h3>Joint Accreditation Performance-in-Practice Structured Abstract</h3>
                <h5>A tool for preparing and demonstrating compliance through performance-in-practice</h5>
            </div><!-- /.col-md-12 -->

            <div class="col-md-12">

                <form id="eForm" action="{{route('project.store')}}" method="POST" class="wizard-big wizard clearfix"
                    enctype="multipart/form-data">
                    @csrf
                    <h1>Activity Overview</h1>

                    <fieldset>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="providership">Activity Overview</label>
                            </div>
                            <div class="form-group col-md-9">
                                <select id="Providership" class="form-control chosen-select" name="providership"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    <option value="Direct">Direct</option>
                                    <option value="Joint">Joint</option>
                                </select>
                            </div>

                        </div>

                        <div class="row mb-3 d-none JP">
                            <div class="col-md-3">
                                <label for="jp_id">Joint Provider</label>
                            </div>
                            <div class="form-group col-md-9">
                                <select id="JointProvider" class="form-control chosen-select" name="jp_id"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    @foreach ($joint_providers as $joint_provider)
                                    <option value="{{ $joint_provider->id }}">{{ $joint_provider->jp_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="JPContacts">

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="jp_2">Joint Provider 2</label>
                            </div>
                            <div class="form-group col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_2" type="radio" name="has_jp_2"
                                                value="1">
                                            <label class="form-check-label" for="has_jp_2">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_2" type="radio" name="has_jp_2"
                                                value="0" checked>
                                            <label class="form-check-label" for="has_jp_2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 d-none JP2">
                            <div class="col-md-3">
                                <label for="jp_id_2">Joint Provider 2</label>
                            </div>
                            <div class="form-group col-md-9">
                                <select id="JointProvider2" class="form-control chosen-select" name="jp_id_2"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    @foreach ($joint_providers as $joint_provider)
                                    <option value="{{ $joint_provider->id }}">{{ $joint_provider->jp_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="AddJPContacts2">

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="jp_3">Joint Provider 3</label>
                            </div>
                            <div class="form-group col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_3" type="radio" name="has_jp_3"
                                                value="1">
                                            <label class="form-check-label" for="has_jp_3">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_3" type="radio" name="has_jp_3"
                                                value="0" checked>
                                            <label class="form-check-label" for="has_jp_3">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 d-none JP3">
                            <div class="col-md-3">
                                <label for="jp_id_3">Joint Provider 3</label>
                            </div>
                            <div class="form-group col-md-9">
                                <select id="JointProvider3" class="form-control chosen-select" name="jp_id_3"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    @foreach ($joint_providers as $joint_provider)
                                    <option value="{{ $joint_provider->id }}">{{ $joint_provider->jp_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="AddJPContacts3">

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="activity_title">Activity Title</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input name="activity_title" type="text" class="form-control"
                                    placeholder="Activity Title">
                                <div class="error_activity_title error_message"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="activity_url">Activity URL</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input name="activity_url" type="text" class="form-control" placeholder="Activity URL">
                                <div class="error_activity_url error_message"></div>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="form-group col-md-4">
                                <label for="ActivityType">Activity Type</label>
                                <select id="activity_type" class="form-control chosen-select" name="activity_type"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    <option value="Course">Course</option>
                                    <option value="Regularly Scheduled Series">Regularly Scheduled Series</option>
                                    <option value="Internet Live Course">Internet Live Course</option>
                                    <option value="Enduring Material">Enduring Material</option>
                                    <option value="Internet Activity Enduring Material">Internet Activity Enduring
                                        Material</option>
                                    <option value="Journal-based CME">Journal-based CME</option>
                                    <option value="Manuscript Review">Manuscript Review</option>
                                    <option value="Test Item Writing">Test Item Writing</option>
                                    <option value="Committee Learning">Committee Learning</option>
                                    <option value="Performance Improvement">Performance Improvement</option>
                                    <option value="Internet Searching and Learning">Internet Searching and Learning
                                    </option>
                                    <option value="Learning from Teaching">Learning from Teaching</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2" id="data_1">
                                <label class="font-noraml">Start Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" id="fromDate" name="start_date"
                                        value="{{date('m/d/Y')}}">
                                </div>
                            </div>

                            <div class="form-group col-md-2" id="data_1">
                                <label class="font-noraml">Expiration Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" id="toDate" name="expiration_date"
                                        value="{{date('m/d/Y')}}">
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="course_credit_amount">Course Credit Amount:</label>
                                <div class="form-group ">
                                    <input name="course_credit_amount" type="text" class="form-control"
                                        placeholder="Course Credit Amount">
                                    <div class="error_course_credit_amount error_message"></div>
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="target_audience">Target Audience for Activity</label>
                            </div>
                            <div class=" col-md-9">
                                <div class="row">
                                    @if(!empty($audience_types))
                                    @foreach ($audience_types as $audience_type)
                                    <div class="col-md-4">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" name="target_audience[]"
                                                id="{{$audience_type->audience_type}}" value="{{$audience_type->id}}">
                                            <label class="form-check-label"
                                                for="{{$audience_type->audience_type}}">{{$audience_type->audience_type}}</label>
                                        </div>
                                        <div class="error_target_audience error_message"></div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class="col-md-4">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="other_members"
                                                name="target_audience[]" value="Other members">
                                            <label class="form-check-label" for="OtherMembers">Other members</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5 d-none specify">
                            <div class="col-md-3">
                                <label for="specify">Please Specify</label>
                            </div>
                            <div class="col-md-9">
                                <input name="target_audience_other_reason" type="text" class="form-control"
                                    placeholder="Please Specify">
                                <div class="error_target_audience_other_reason error_message"></div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-2">
                                <label for="accreditation_types">Accreditation Type</label>
                                <div class="AccreditationBox MainBox" ondrop="drop(event, 'Accreditation')"
                                    ondragover="allowDrop(event)">
                                    @foreach ($credit_types as $credit_type)
                                    <span class="tag-item" ondragstart="dragStart(event)" draggable="true"
                                        id="{{$credit_type->id}}">
                                        {{$credit_type->credit_code}}
                                    </span>  
                                    <br>                                  
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-12">
                                    <label for="accreditation_types">MLI</label>
                                    <div class="AccreditationBox MLIBox" ondrop="drop(event, 'MLI')" ondragover="allowDrop(event)">
    
                                        @foreach ($credit_types as $credit_type)
                                        <div class="row col-md-12">
                                            <div class="col-md-2">
                                                <div id="accreditationType-{{$credit_type->id}}">
                                                </div>                                                
                                            </div>
    
                                            <div class="col-md-4">
                                                <div id="levelText-{{$credit_type->id}}">
                                                </div>
                                            </div>
    
                                            <div class="col-md-2">
                                                <div id="criteria-{{$credit_type->id}}">
                                                </div>
                                            </div>
    
                                            <div class="col-md-4">
                                                <div id="pharmacologyAmount-{{$credit_type->id}}">
                                                </div>
                                            </div>                                        
                                        </div>  
                                        <div class="BoxHR d-none" id="BoxHR{{$credit_type->id}}"><hr></div>                                                                           
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mt-3">
                                    <label for="accreditation_types">Non-MLI</label>
                                    <div class="AccreditationBox NonMLIBox" id="NonMLI" root=false ondrop="drop(event, 'NonMLI')"
                                        ondragover="allowDrop(event)">
                                        @foreach ($credit_types as $credit_type)
                                        <div class="row col-md-12">
                                            <div class="col-md-2">
                                                <div id="accreditationTypeNonMli-{{$credit_type->id}}">
                                                </div>
                                            </div>
    
                                            <div class="col-md-4">
                                                <div id="levelTextNonMli-{{$credit_type->id}}">
                                                </div>
                                            </div>
    
                                            <div class="col-md-2">
                                                <div id="criteriaNonMli-{{$credit_type->id}}">
                                                </div>
                                            </div>
    
                                            <div class="col-md-4">
                                                <div id="pharmacologyAmountNonMli-{{$credit_type->id}}">
                                                </div>
                                            </div>    
                                        </div> 
                                        <div class="BoxHR d-none" id="BoxHRNonMli{{$credit_type->id}}"><hr></div>                                        
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>                        

                        <hr>

                        <div class="form-group row mb-3 mt-3" id="MOC">
                            <div class="col-md-3"><label for="moc">MOC</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input moc" type="radio" name="moc" value="1">
                                            <label class="form-check-label" for="moc">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input moc" type="radio" name="moc" value="0">
                                            <label class="form-check-label" for="moc">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-none" id="MocBoards">
                            <hr>
                            <div class="form-group row  mb-3 mt-3">
                                <div class="col-md-3"><label for="moc_boards">MOC Boards</label></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($moc_boards as $moc_board)
                                        <div class="col-md-4">
                                            <div class="checkbox checkbox-primary">
                                                <input class="form-check-input moc_boards" type="checkbox"
                                                    name="moc_boards[]" value="{{$moc_board->id}}">
                                                <label class="form-check-label"
                                                    for="{{$moc_board->board_code}}">{{$moc_board->board_code}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="MocView">

                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="ol3_knowledge">Outcome Level</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol3_knowledge"
                                                name="ol3_knowledge" value="1">
                                            <label class="form-check-label" for="ol3_knowledge">3</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol4_competence"
                                                name="ol4_competence" value="1">
                                            <label class="form-check-label" for="ol4_competence">4</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol5_performance"
                                                name="ol3_knowledge" value="1">
                                            <label class="form-check-label" for="ol5_performance">5</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol6_patient_outcomes"
                                                name="ol6_patient_outcomes" value="1">
                                            <label class="form-check-label" for="ol6_patient_outcomes">6</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol7_community_health"
                                                name="ol7_community_health" value="1">
                                            <label class="form-check-label" for="ol7_community_health">7</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="accreditation_type_4_ipce">Accreditation</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="accreditation_type_4_ipce"
                                                name="accreditation_type_4_ipce" value="IPCE">
                                            <label class="form-check-label" for="accreditation_type_4_ipce">IPCE</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="accreditation_type_4_ipce"
                                                name="accreditation_type_4_ipce" value="Uni">
                                            <label class="form-check-label"
                                                for="accreditation_type_4_ipce">Non-IPCE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-5">
                            <label for="description" class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control" id="description" cols="30"
                                    rows="4"></textarea>
                                <div class="error_description error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="notes" class="col-md-3 col-form-label">Notes</label>
                            <div class="col-md-9">
                                <textarea name="notes" class="form-control" id="notes" cols="30" rows="4"></textarea>
                                <div class="error_notes error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="doa_or_ed_notes" class="col-md-3 col-form-label">DoA or ED Notes</label>
                            <div class="col-md-9">
                                <textarea name="doa_or_ed_notes" id="doa_or_ed_notes" class="form-control" cols="30"
                                    rows="4"></textarea>
                                <div class="error_doa_or_ed_notes error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="ta_keywords" class="col-md-3 col-form-label">TA keywords</label>
                            <div class="col-md-9">
                                <textarea name="ta_keywords" id="ta_keywords" class="form-control" cols="30"
                                    rows="4"></textarea>
                                <div class="error_ta_keywords error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="professionalPractice" class="col-md-3 col-form-label">State the <b>professional
                                    practice gap(s)</b> of your learners on which the activity was based (maximum 100
                                words). [JAC4]</label>
                            <div class="col-md-9">
                                <textarea name="practice_gap" class="form-control" id="practice_gap" cols="30"
                                    rows="4"></textarea>
                                <div class="error_practice_gap error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="professionalPractice" class="col-md-3 col-form-label">State the educational
                                need(s) that you determined to be the cause of the professional practice gap(s) (maximum
                                50 words each). [JAC4]</label>
                            <div class="col-md-3">

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" name="enable_needs[]"
                                        id="enable_knowledge_need" value="Knowledge need">
                                    <label class="form-check-label" for="knowledge_need">Knowledge need
                                        <small>and/or</small></label>
                                </div>

                                <textarea name="knowledge_need" class="form-control" id="knowledge_need" cols="30"
                                    rows="2" disabled></textarea>
                                <div class="error_knowledge_need error_message"></div>

                            </div>
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" name="enable_needs[]"
                                        id="enable_skills_need" value="Skills/Strategy need">
                                    <label class="form-check-label" for="skills_need">Skills/Strategy need
                                        <small>and/or</small></label>
                                </div>
                                <textarea name="skills_need" class="form-control" id="skills_need" cols="30" rows="2"
                                    disabled></textarea>
                                <div class="error_skills_need error_message"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" name="enable_needs[]"
                                        id="enable_performance_need" value="Performance need">
                                    <label class="form-check-label" for="performance_need">Performance need
                                        <small>and/or</small></small></label>
                                </div>
                                <textarea name="performance_need" class="form-control" id="performance_need" cols="30"
                                    rows="2" disabled></textarea>
                                <div class="error_performance_need error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="activity_designed" class="col-md-3 col-form-label">State what this CE activity
                                was designed to change in terms of learner's skill/strategy or performance of the
                                healthcare team or patient outcomes. (maximum 50 words). [JAC5]</label>
                            <div class="col-md-9">
                                <textarea name="activity_designed" class="form-control" id="activity_designed" cols="30"
                                    rows="5"></textarea>
                                <div class="error_activity_designed error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="learning_objectives" class="col-md-3 col-form-label">Learning objectives /
                                outcomes</label>
                            <div class="col-md-9">
                                <textarea name="learning_objectives" class="form-control" id="learning_objectives"
                                    cols="30" rows="5"></textarea>
                                <div class="error_learning_objectives error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="ensure_activity" class="col-md-3 col-form-label">Explain how you ensured the
                                activity was generated around valid content. (maximum 50 words). [JAC6]</label>
                            <div class="col-md-9">
                                <textarea name="ensure_activity" class="form-control" id="ensure_activity" cols="30"
                                    rows="5"></textarea>
                                <div class="error_ensure_activity error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="educational_format" class="col-md-3 col-form-label">Explain how the activity
                                promotes active learning for the healthcare team that is consistent with the activity’s
                                desired results (maximum 50 words) [JAC7]</label>
                            <div class="col-md-9">
                                <textarea name="educational_format" class="form-control" id="educational_format"
                                    cols="30" rows="4"></textarea>
                                <div class="error_educational_format error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="planned_strategies" class="col-md-3 col-form-label">Describe one or two
                                ancillary support tools or strategies you envision making available to learners in this
                                activity for the purpose of sustaining changes advocated in this activity: [e.g.,
                                algorithms, patient handouts, checklists, guides, etc [JAC9]</label>
                            <div class="col-md-9">
                                <textarea name="planned_strategies" class="form-control" id="planned_strategies"
                                    cols="30" rows="4"></textarea>
                                <div class="error_planned_strategies error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-5 barriers_strategies">
                            <label for="barriers_strategies" class="col-md-3 col-form-label">Identify barriers to change
                                for the healthcare team members associated with this activity and strategies you plan to
                                implement to remove, overcome or address those barriers to change [JAC10]</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies"
                                                name="barriers_strategies[]"
                                                value="Engage patients and caregivers in shared decision making">
                                            <label class="form-check-label" for="barriers_strategies">Engage patients
                                                and caregivers in shared decision making</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies"
                                                name="barriers_strategies[]"
                                                value="Coordinating care with interprofessional team">
                                            <label class="form-check-label" for="barriers_strategies">Coordinating care
                                                with interprofessional team</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies"
                                                name="barriers_strategies[]" value="Patient adherence">
                                            <label class="form-check-label" for="barriers_strategies">Patient
                                                adherence</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies"
                                                name="barriers_strategies[]"
                                                value="Decision making in the presence of conflicting evidence">
                                            <label class="form-check-label" for="barriers_strategies">Decision making in
                                                the presence of conflicting evidence</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies"
                                                name="barriers_strategies[]"
                                                value="Lack of training/experience with this specific topic">
                                            <label class="form-check-label" for="barriers_strategies">Lack of
                                                training/experience with this specific topic</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies"
                                                name="barriers_strategies[]"
                                                value="Cost/Reimbursement/Therapy Approval Status">
                                            <label class="form-check-label"
                                                for="barriers_strategies">Cost/Reimbursement/Therapy Approval
                                                Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="barriers_strategies_other" class="col-md-3 col-form-label">Other</label>
                            <div class="col-md-9">
                                <input type="text" name="barriers_strategies_other" class="form-control"
                                    id="barriers_strategies_other" />
                                <div class="error_barriers_strategies_other error_message"></div>
                            </div>
                        </div>

                        <div class="form-group mb-2 text-center">
                            <p>Indicate the desirable attribute(s) of the healthcare team (i.e., competencies) this
                                activity addresses. [JAC8]</p>

                            <label for="TargetAudience" class="size16"><strong>Core Competencies for</strong></label>

                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="medicine_institutes"><strong>Institute of Medicine
                                        Competencies</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Provide-patient"
                                        name="medicine_institutes[]" value="Provide patient-centered care">
                                    <label class="form-check-label" for="Provide-patient">Provide patient-centered
                                        care</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Work-interdisciplinary"
                                        name="medicine_institutes[]" value="Work in interdisciplinary teams">
                                    <label class="form-check-label" for="Work-interdisciplinary">Work in
                                        interdisciplinary teams</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Employ-evidence"
                                        name="medicine_institutes[]" value="Employ evidence-based practice">
                                    <label class="form-check-label" for="Employ-evidence">Employ evidence-based
                                        practice</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Apply-quality"
                                        name="medicine_institutes[]" value="Apply quality improvement">
                                    <label class="form-check-label" for="Apply-quality">Apply quality
                                        improvement</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Utilize-informatics"
                                        name="medicine_institutes[]" value="Utilize informatics">
                                    <label class="form-check-label" for="Utilize-informatics">Utilize
                                        informatics</label>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <label for="collaborative_practices"><strong>Interprofessional Collaborative
                                        Practice</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" class="form-check-input" type="checkbox"
                                        id="Interprofessional-Practice"
                                        value="Values/Ethics for Interprofessional Practice">
                                    <label class="form-check-label" for="Interprofessional-Practice">Values/Ethics for
                                        Interprofessional Practice</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" class="form-check-input" type="checkbox"
                                        id="Roles-Responsibilities" value="Roles/Responsibilities">
                                    <label class="form-check-label"
                                        for="Roles-Responsibilities">Roles/Responsibilities</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" class="form-check-input" type="checkbox"
                                        id="InterorofessionalCommunucation" value="Interprofessional Communucation">
                                    <label class="form-check-label"
                                        for="InterorofessionalCommunucation">Interprofessional
                                        Communucation</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" value="Teams and Teamwork"
                                        class="form-check-input" type="checkbox" id="TeamsTeamwork">
                                    <label class="form-check-label" for="TeamsTeamwork">Teams and Teamwork</label>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <label for="acgme_abms_competencies"><strong>ACGME/ABMS Competencies</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" class="form-check-input" type="checkbox"
                                        id="PatientCare" value="Patient Care and Procedural Skills">
                                    <label class="form-check-label" for="PatientCare">Patient Care and Procedural
                                        Skills</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" class="form-check-input" type="checkbox"
                                        id="Medical-Knowledge" value="Medical Knowledge">
                                    <label class="form-check-label" for="Medical-Knowledge">Medical Knowledge</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" class="form-check-input" type="checkbox"
                                        id="Practice-based" value="Practice-based Learning and Improvement">
                                    <label class="form-check-label" for="Practice-based">Practice-based Learning and
                                        Improvement</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" class="form-check-input" type="checkbox"
                                        id="Interpersonal-and-Communication Skills"
                                        value="Interpersonal and Communication Skills">
                                    <label class="form-check-label" for="Practice-based">Interpersonal and Communication
                                        Skills</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" class="form-check-input" type="checkbox"
                                        id="Professionalism" value="Professionalism">
                                    <label class="form-check-label" for="Practice-based">Professionalism</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" class="form-check-input" type="checkbox"
                                        id="System-based-Practice" value="System-based Practice">
                                    <label class="form-check-label" for="Practice-based">System-based Practice</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-5">

                            <div class="col-md-4">

                                <label for="national_quality_strategy"><strong>National Quality
                                        Strategy</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" class="form-check-input" type="checkbox"
                                        value="Making Care Safer">
                                    <label class="form-check-label">Making Care Safer</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" class="form-check-input" type="checkbox"
                                        value="Patient and Family Engagement">
                                    <label class="form-check-label">Patient and Family Engagement</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" class="form-check-input" type="checkbox"
                                        value="Communication and Care Coordination">
                                    <label class="form-check-label">Communication and Care Coordination</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" class="form-check-input" type="checkbox"
                                        value="Prevention and Treatment Strategies">
                                    <label class="form-check-label">Prevention and Treatment Strategies</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" class="form-check-input" type="checkbox"
                                        value="Healthy Living">
                                    <label class="form-check-label">Healthy Living</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" class="form-check-input" type="checkbox"
                                        value="Care Affordability">
                                    <label class="form-check-label">Care Affordability</label>
                                </div>
                            </div>
                        </div>

                        <label for="cape_competencies"><strong>CAPE Competencies</strong></label>
                        <div class="form-group row mb-5">
                            <div class="col-md-3">
                                <label for="knowledge"><strong>Knowledge</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="knowledge[]" class="form-check-input" type="checkbox"
                                        id="FoundationalKnowledge" value="Foundational Knowledge">
                                    <label class="form-check-label" for="FoundationalKnowledge">Foundational
                                        Knowledge</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="practice_and_care_approaches"><strong>Practice and Care
                                        Approaches</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" class="form-check-input"
                                        type="checkbox" id="problem-solving" value="Problem-solving">
                                    <label class="form-check-label" for="problem-solving">Problem-solving</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" class="form-check-input"
                                        type="checkbox" id="educator" value="Educator">
                                    <label class="form-check-label" for="educator">Educator</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" class="form-check-input"
                                        type="checkbox" id="patient-advocacy" value="Patient Advocacy">
                                    <label class="form-check-label" for="patient-advocacy">Patient Advocacy</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" class="form-check-input"
                                        type="checkbox" id="interprofessional-collaboration"
                                        value="Interprofessional collaboration">
                                    <label class="form-check-label"
                                        for="interprofessional-collaboration">Interprofessional
                                        collaboration</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" class="form-check-input"
                                        type="checkbox" id="cultural-sensitivity" value="Cultural Sensitivity">
                                    <label class="form-check-label" for="cultural-sensitivity">Cultural
                                        Sensitivity</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" class="form-check-input"
                                        type="checkbox" id="communication" value="Communication">
                                    <label class="form-check-label" for="communication">Communication</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="practice_and_care_essentials"><strong>Practice and Care
                                        Essentials</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" class="form-check-input"
                                        type="checkbox" id="patient-centered-care" value="Patient-centered care">
                                    <label class="form-check-label" for="patient-centered-care">Patient-centered
                                        care</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" class="form-check-input"
                                        type="checkbox" id="medication-use-systems-management"
                                        value="Medication use systems management">
                                    <label class="form-check-label" for="medication-use-systems-management">Medication
                                        use systems
                                        management</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" class="form-check-input"
                                        type="checkbox" id="health-and-wellness" value="Health and wellness">
                                    <label class="form-check-label" for="health-and-wellness">Health and
                                        wellness</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" class="form-check-input"
                                        type="checkbox" id="population-based-care" value="Population-based care">
                                    <label class="form-check-label" for="population-based-care">Population-based
                                        care</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="personal_and_profesional_development"><strong>Personal and Profesional
                                        Development</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" class="form-check-input"
                                        type="checkbox" id="self-awareness" value="Self-awareness">
                                    <label class="form-check-label" for="self-awareness">Self-awareness</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" class="form-check-input"
                                        type="checkbox" id="leadership" value="Leadership">
                                    <label class="form-check-label" for="leadership">Leadership</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" class="form-check-input"
                                        type="checkbox" id="ionnovataion_and_entrepreneurship"
                                        value="Innovataion and Entrepreneurship">
                                    <label class="form-check-label" for="ionnovataion_and_entrepreneurship">Innovataion
                                        and
                                        Entrepreneurship</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" class="form-check-input"
                                        type="checkbox" id="Professionalism" value="Professionalism">
                                    <label class="form-check-label" for="Professionalism">Professionalism</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="other_competencies" class="col-md-3 col-form-label">Other
                                Competency(ies)(specify)</label>
                            <div class="col-md-9">
                                <input type="text" name="other_competencies" class="form-control"
                                    id="other_competencies" />
                                <div class="error_other_competencies error_message"></div>
                            </div>
                        </div>

                        <div>
                            <div class="error_message_providership error_message"></div>
                            <div class="error_message_description error_message"></div>
                            <div class="error_message_course_credit_amount error_message"></div>
                            <div class="error_message_accreditation_type_4_ipce error_message"></div>
                            <div class="error_message_moc error_message"></div>
                            <div class="error_message_activity_title error_message"></div>
                            <div class="error_message_start_date error_message"></div>
                            <div class="error_message_target_audience error_message"></div>
                            <div class="error_message_target_audience_other_reason error_message"></div>
                            <div class="error_message_practice_gap error_message"></div>
                            <div class="error_message_knowledge_need error_message"></div>
                            <div class="error_message_skills_need error_message"></div>
                            <div class="error_message_performance_need error_message"></div>
                            <div class="error_message_enable_needs error_message"></div>
                            <div class="error_message_activity_designed error_message"></div>
                            <div class="error_message_activity_matches error_message"></div>
                            <div class="error_message_educational_format error_message"></div>
                            <div class="error_message_other_competencies error_message"></div>
                        </div>


                    </fieldset>

                    <h1>Disclosures</h1>

                    <fieldset>
                        <div class="form-group mb-4">
                            <h5>For all INDIVIDUALS IN CONTROL OF CONTENT for the activity...</h5>
                            <hr>
                            <p>Complete the table below. If you have this information already available electronically,
                                then simply include it as part of Attachment 2. For each individual in control of
                                content, list the name of the individual, the individual's role (e.g., planner, editor,
                                content reviewer, faculty) in the activity, the name of the ACCME-defined commercial
                                interest with which the individual has a relevant financial relationship (or if the
                                individual has no relevant financial relationships), and the nature of that
                                relationship. [JAC9, SCS 2.1, 2.2,2.3]</p>

                            <p>(Note: please ensure that when you are collectiong this information from individuals,
                                that you are using the most current definitions of what constitutes a relevant financial
                                relationship and ACCME-defined commercial interest.)</p>
                        </div>

                        <div class="form-group mb-4">
                            <div class="tableContentWrap">
                                <table id="individualsActivity" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name of individual</th>
                                            <th>Individual's role in activity</th>
                                            <th>Name of commercial interest</th>
                                            <th>Nature of relationship</th>
                                            <th>Mechanism(s) implemented to resolve conflict of interest (COI)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Example: Jane Smythe, MD</td>
                                            <td>Course Director</td>
                                            <td>None</td>
                                            <td>---</td>
                                            <td>---</td>
                                        </tr>
                                        <tr>
                                            <td>Example: Thomas Jones</td>
                                            <td>Faculty</td>
                                            <td>Pharma Co. US</td>
                                            <td>Research grant</td>
                                            <td>---</td>
                                        </tr>
                                        <tr class="control_individuals">
                                            <td><input class="form-control expandable" type="text"
                                                    name="controll_individuals[1][name_of_individual]" value=""></td>
                                            <td>
                                                <select id="other-role_in_activity-1" class="form-control"
                                                    name="controll_individuals[1][role_in_activity]">
                                                    <option value="">(Select One)</option>
                                                    <option value="Chair/Course Director">Chair/Course Director</option>
                                                    <option value="Faculty">Faculty</option>
                                                    <option value="Content/Peer Reviewer">Content/Peer Reviewer</option>
                                                    <option value="Nurse Planner">Nurse Planner</option>
                                                    <option value="Pharmacist Planner">Pharmacist Planner</option>
                                                    <option value="Planning Committee">Planning Committee</option>
                                                    <option value="Planner">Planner</option>
                                                    <option value="Faculty/Planner">Faculty/Planner</option>
                                                    <option value="other">other</option>
                                                </select>
                                                <br>
                                                <input id="specify-role_in_activity-1" class="form-control d-none"
                                                    type="text" name="controll_individuals[1][role_in_activity]"
                                                    value="">
                                            </td>
                                            <td>
                                                <select class="form-control"
                                                    name="controll_individuals[1][commercial_interest]">
                                                    <option value="None">None</option>
                                                    <option value="See Attachment B">See Attachment B</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control"
                                                    name="controll_individuals[1][nature_of_relationship]">
                                                    <option value="N/A">N/A</option>
                                                    <option value="See Attachment B">See Attachment B</option>
                                                </select>
                                            </td>
                                            <td><input class="form-control" type="text"
                                                    name="controll_individuals[1][mechanisms]" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text_Content mb-3">
                                    <p>(If there are additional individuals in control of content for the activity,
                                        please attach a separate page using the same column headings.)</p>
                                </div>

                                <div class="text-right mb-5">
                                    <button id="moreIndividualsActivity" type="button"
                                        class="btn btn-primary btn-sm">Add more</button>
                                </div>

                                <div class="input-group dis_attachments mb-4">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Attachments</span>
                                    </div>

                                    <div class="input-group control-group increment">
                                        <input type="file" name="dis_attachments[]" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="button">Add</button>
                                        </div>
                                    </div>
                                    <div class="clone d-none">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" name="dis_attachments[]" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger" type="button">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </fieldset>

                    <h1>Commercial Support</h1>
                    <fieldset>

                        <div class="form-group mb-4">
                            <label for="commercial_support_received">Commercial Support Received</label>
                            <select id="commercial_support_received" class="form-control" name="has_commercial_support"
                                data-placeholder="(Select one)">
                                <option selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <h5>If the activity was COMMERCIALLY SUPPORTED...</h5>
                            <hr>
                            <p>Complete the table below. If you have this information already available electronically,
                                then simply include it as part of Attachment 7. List the names of the commercial
                                supporters of this activity and the dollar value of any monetary commercial support
                                and/or indicate in-kind support [JAC12, SCS 3.4-3.6].</p>
                            <hr>
                        </div>

                        <div class="form-group mb-5">
                            <div class="tableContentWrap">
                                <table id="commercialActivity" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="commercialSupport">Name of commercial supporter</th>
                                            <th class="commercialSupport">Grant Number</th>
                                            <th class="commercialSupport">Amount $US</th>
                                            <th class="inKind">In-kind</th>
                                            <th class="text-left attachment7Title">Attachment #7</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control" type="text"
                                                    name="commercial_supporters[1][name]"></td>
                                            <td>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="commercial_supporters[1][grant_id]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="commercial_supporters[1][amount]">
                                            </td>
                                            <td class="text-left">
                                                <div class="checkbox checkbox-primary mt-8">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="commercial_supporters[1][in_kind]">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="support_attachment_7_1" name="support_attachment_7_1">
                                                    <span class="img_text">No File Selected</span>
                                                    <label class="custom-file-label"
                                                        for="support_attachment_7_1"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text_Content mb-3">
                                    <p>(If there are additional commercial supporters, please attach a separate page
                                        using the same column headings.)</p>
                                </div>

                                <div class="text-right mb-5">
                                    <button id="moreCommercialActivity" type="button" class="btn btn-primary btn-sm">Add
                                        more</button>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <h1>Evidence</h1>
                    <fieldset>
                        @include('frontend.template.attachment')

                        <div class="form-group mb-4">
                            <h3>Joint Accreditation Commendation Criteria</h3>
                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3">
                                <label for="jac13">JAC 13</label>
                            </div>
                            <div class="col-md-9">
                                <label for="jac13">The provider engages patients as planners and teachers in accredited
                                    interprofessional
                                    continuing education (IPCE) and/or CE.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Includes planners who are patients and/or public representatives AND
                                                </li>
                                                <li>Includes teachers who are patients and/or public representatives
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac13" name="jac13"
                                                value="1">
                                            <label class="form-check-label" for="jac13">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac13" id="jac13" checked
                                                value="0">
                                            <label class="form-check-label" for="jac13">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac13_description" class="col-form-label">
                                    Describe in what way the planners and presenters of the activity represent the
                                    patient or public, along with
                                    the role they played in the planning AND delivery of your CE activity. (maximum 250
                                    words per example)
                                </label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac13_description" id="jac13_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac13_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac14">JAC 14</label></div>
                            <div class="col-md-9">
                                <label for="jac14">The provider engages students of the health professions as planners
                                    and teachers in
                                    accredited interprofessional continuing education (IPCE) and/or CE.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Includes planners who are students of the health professions AND
                                                </li>
                                                <li>Includes teachers who are students of the health professions</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac14" name="jac14"
                                                value="1">
                                            <label class="form-check-label" for="jac14">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac14" id="jac14" checked
                                                value="0">
                                            <label class="form-check-label" for="jac14">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac14_description" class="col-form-label">Describe the health professions’
                                    students involved in the
                                    activity, including their profession and level of study (e.g. undergraduate medical
                                    students, nurse
                                    practitioner students, residents in general surgery) and how they participated as
                                    both planners and faculty
                                    of the activity. (maximum 250 words per example activity)
                                </label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac14_description" id="jac14_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac14_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac17">JAC 17</label></div>
                            <div class="col-md-9">
                                <label for="jac17">The provider advances the use of health and practice data for health
                                    care
                                    improvement.
                                </label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Teaches about collection, analysis, or synthesis of health/practice
                                                    data AND</li>
                                                <li>Uses health/practice data to teach about healthcare improvement</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac17" name="jac17"
                                                value="1">
                                            <label class="form-check-label" for="jac17">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac17" id="jac17" checked
                                                value="0">
                                            <label class="form-check-label" for="jac17">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac17_description" class="col-form-label">Describe how the activity taught
                                    learners about
                                    collection, analysis, or synthesis of health/practice data and how the activity used
                                    health/practice data to
                                    teach about healthcare improvement. (maximum 250 words per activity
                                    description)</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac17_description" id="jac17_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac17_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac18">JAC 18</label></div>
                            <div class="col-md-9">
                                <label for="jac18">The provider identifies and addresses factors beyond clinical care
                                    (e.g. social determinants) that affect the health of the patients and integrates
                                    those factors into accredited IPCE and/or CE.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Teaches strategies that learners can use to achieve improvements in
                                                    population health</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac18" name="jac18"
                                                value="1">
                                            <label class="form-check-label" for="jac18">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac18" id="jac18" checked
                                                value="0">
                                            <label class="form-check-label" for="jac18">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac18_description" class="col-form-label">Describe the strategy or
                                    strategies used to achieve
                                    improvements in population health
                                    (maximum 250 words per example)</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac18_description" id="jac18_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac18_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac19">JAC 19</label></div>
                            <div class="col-md-9">
                                <label for="jac19">The provider collaborates with other organizations to more
                                    effectively address population
                                    health issues.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Creates or continues collaborations with one or more healthcare or
                                                    community organization(s)
                                                    AND</li>
                                                <li>Demonstrates that the collaborations augment the provider’s ability
                                                    to address population
                                                    health issues</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac19" name="jac19"
                                                value="1">
                                            <label class="form-check-label" for="jac19">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac19" id="jac19" checked
                                                value="0">
                                            <label class="form-check-label" for="jac19">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac19_description" class="col-form-label">Describe the nature of the
                                    collaboration (new/continued)
                                    with one or more healthcare or community organization(s) AND demonstrate that the
                                    collaboration augmented
                                    MLI’s ability to address population health issues.</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac19_description" id="jac19_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac19_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac24">JAC 23</label></div>
                            <div class="col-md-9">
                                <label for="jac23">The provider demonstrates improvement in the performance of the
                                    healthcare team as a result of its overall IPCE program.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Collaborates in the process of healthcare quality improvement AND
                                                </li>
                                                <li>Demonstrates improvement in healthcare quality</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac23" name="jac23"
                                                value="1">
                                            <label class="form-check-label" for="jac23">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac23" id="jac23" checked
                                                value="0">
                                            <label class="form-check-label" for="jac23">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac23_description" class="col-form-label">Describe how MLI collaborated in
                                    the process of healthcare
                                    quality improvement, along with the improvements that resulted. Include data
                                    (qualitative or quantitative)
                                    that demonstrates those improvements (maximum 500 words per collaboration).</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac24_description" id="jac23_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac23_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac24">JAC 24</label></div>
                            <div class="col-md-9">
                                <label for="jac24">The provider demonstrates healthcare quality improvement achieved
                                    through the involvement of
                                    its overall IPCE program. </label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Collaborates in the process of healthcare quality improvement AND
                                                </li>
                                                <li>Demonstrates improvement in healthcare quality</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac24" name="jac24"
                                                value="1">
                                            <label class="form-check-label" for="jac24">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac24" id="jac24" checked
                                                value="0">
                                            <label class="form-check-label" for="jac24">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac24_description" class="col-form-label">Describe how MLI collaborated in
                                    the process of healthcare
                                    quality improvement, along with the improvements that resulted. Include data
                                    (qualitative or quantitative)
                                    that demonstrates those improvements (maximum 500 words per collaboration).</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac24_description" id="jac24_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac24_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac25">JAC 25</label></div>
                            <div class="col-md-9">
                                <label for="jac25">The provider demonstrates the positive impact of its overall IPCE
                                    program on patients or
                                    their communities.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Collaborates in the process of improving patient or community health
                                                    AND</li>
                                                <li>Demonstrates improvement in patient or community outcomes</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac25" name="jac25"
                                                value="1">
                                            <label class="form-check-label" for="jac25">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac25" id="jac25" checked
                                                value="0">
                                            <label class="form-check-label" for="jac25">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac25_description" class="col-form-label">Describe how MLI collaboration in
                                    the process of improving
                                    patient or community health that included CE, along with the improvements that
                                    resulted. Include data
                                    (qualitative or quantitative) that demonstrates those improvements (maximum 500
                                    words per
                                    collaboration).</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="jac25_description" id="jac25_description" class="form-control"
                                            cols="30" rows="4"></textarea>
                                        <div class="error_jac25_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="error_message_jac13_description error_message"></div>
                            <div class="error_message_jac14_description error_message"></div>
                            <div class="error_message_jac17_description error_message"></div>
                            <div class="error_message_jac18_description error_message"></div>
                            <div class="error_message_jac19_description error_message"></div>
                            <div class="error_message_jac24_description error_message"></div>
                            <div class="error_message_jac25_description error_message"></div>
                        </div>
                    </fieldset>

                </form>

            </div>
        </div><!-- /.row -->
    </div>
    <!--Container-->
</section><!-- /.col -->

@endsection
