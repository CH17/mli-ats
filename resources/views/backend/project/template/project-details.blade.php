<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Basic Information</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-b-md">

                    @if (!empty($is_user) || $user_role == 'ADMIN' || $user_role == 'ED')
                        <a href="{{ route('project.edit', ['project' => $project->id]) }}"
                            class="btn btn-white btn-xs pull-right mt-5">Edit project</a>
                    @endif

                    <h2>{{ $project->activity_title }} @if (!empty($project->project_status)) <span
                                class="label label-primary va-mddle">{{ $project->project_status->name }}</span>
                        @endif
                    </h2>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <dl class="dl-horizontal left">
                    <dt>Activity ID:</dt>
                    <dd>{{ $project->activity_id }}</dd>
                    <dt>Project ID:</dt>

                    @if (!empty($project->project_code))
                        <dd>{{ $project->project_code }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif

                    <dt>Joint Provider:</dt>
                    @if (!empty($project->joint_provider))
                        <dd>{{ $project->joint_provider->jp_code }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif

                    <dt>JP CR Code:</dt>
                    @if (!empty($project->jp_cr_code))
                        <dd>{{ $project->jp_cr_code }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif


                    <dt>Joint Provider 2:</dt>
                    @if (!empty($project->joint_provider_2))
                        <dd>{{ $project->joint_provider_2->jp_code }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif

                    <dt>Joint Provider 3:</dt>
                    @if (!empty($project->joint_provider_3))
                        <dd>{{ $project->joint_provider_3->jp_code }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif



                    <dt>Activity Type:</dt>
                    @if (!empty($project->activity_type))
                        <dd>{{ $project->activity_type }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif
                    @if (!empty($project->providership))
                        <dt>Activity Providership:</dt>
                        <dd>{{ $project->providership }}</dd>
                    @endif
                    <dt>Commercial Support Received:</dt>
                    @if (!empty($project->has_commercial_support))
                        <dd>{{ $project->has_commercial_support }} </dd>
                    @else
                        <dd>N/A</dd>
                    @endif
                    <dt>Activity URL:</dt>
                    @if (!empty($project->activity_url))
                        <dd>{{ $project->activity_url }}</dd>
                    @else
                        <dd>N/A</dd>
                    @endif
                </dl>
            </div>

            <div class="col-md-4" id="cluster_info">
                <dl class="dl-horizontal">
                    <dt>Start Date:</dt>
                    <dd>{{ date('Y-m-d', strtotime($project->start_date)) }}</dd>
                    <dt>Expiration Date:</dt>
                    <dd>{{ date('Y-m-d', strtotime($project->expiration_date)) }}</dd>
                    <dt>Last Updated:</dt>
                    <dd>{{ date('Y-m-d', strtotime($project->updated_at)) }}</dd>
                    <dt>Created:</dt>
                    <dd> {{ date('Y-m-d', strtotime($project->created_at)) }} </dd>
                </dl>
            </div>

            <div class="clear"></div>
            <div class="hr-line-dashed"></div>
            <div class="wrapper wrapper-content project-manager">


                @php
                    $jp_contacts = '';
                    if (!empty($project->jp_contacts)) {
                        $jp_contacts = $project->jp_contacts;
                    }
                @endphp

                @if (count($jp_contacts) > 0)
                    <div>
                        <h5>JP Contacts</h5>
                        @foreach ($jp_contacts as $jp_contact)
                            <div class="tag-list" style="padding: 0">
                                <span class="tag-item"> {{ $jp_contact->contact_name }} </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="hr-line-dashed"></div>
                @endif


                @php
                    $jp_contacts_2 = '';
                    if (!empty($project->jp_contacts_2)) {
                        $jp_contacts_2 = $project->jp_contacts_2;
                    }
                @endphp

                @if (count($jp_contacts_2) > 0)
                    <div>
                        <h5>JP Contacts 2</h5>
                        @foreach ($jp_contacts_2 as $jp_contact)
                            <div class="tag-list" style="padding: 0">
                                <span class="tag-item"> {{ $jp_contact->contact_name }} </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="hr-line-dashed"></div>
                @endif


                @php
                    $jp_contacts_3 = '';
                    if (!empty($project->jp_contacts_3)) {
                        $jp_contacts_3 = $project->jp_contacts_3;
                    }
                @endphp

                @if (count($jp_contacts_3) > 0)
                    <div>
                        <h5>JP Contacts 3</h5>
                        @foreach ($jp_contacts_3 as $jp_contact)
                            <div class="tag-list" style="padding: 0">
                                <span class="tag-item"> {{ $jp_contact->contact_name }} </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="hr-line-dashed"></div>
                @endif



                {{-- Target Audiences start --}}
                @php
                    $target_audiences = '';
                    if (!empty($project->audience_types)) {
                        $target_audiences = $project->audience_types;
                    }
                @endphp


                <div>
                    <h5>Target Audience for Activity</h5>
                    <div class="tag-list" style="padding: 0">
                        @if (count($target_audiences) > 0)
                            @foreach ($target_audiences as $target_audience)
                                <span class="tag-item"> {{ $target_audience->audience_type }} </span>
                            @endforeach
                        @else
                            <span class="tag-item">N/A</span>
                        @endif
                    </div>
                </div>


                @if (!empty($project->meta->target_audience_other_reason))
                    <div class="hr-line-dashed"></div>
                    <div>
                        <h5>Specification</h5>
                        <div class="tag-list" style="padding: 0">
                            {{ $project->meta->target_audience_other_reason }}
                        </div>
                    </div>
                @endif
                {{-- Target Audiences end --}}

                <div class="hr-line-dashed"></div>

                {{-- Accreditation Types start --}}
                @php
                    $accreditation_type_projects = '';
                    if (!empty($project->accreditation_type_projects)) {
                        $accreditation_type_projects = $project->accreditation_type_projects;
                    }
                @endphp

                <div>
                    <h5>Accreditation Types (MLI)</h5>

                    @if (!empty($accreditation_type_projects) && count($accreditation_type_projects))
                        <div class="row">
                            @foreach ($accreditation_type_projects as $key => $accreditation_type)
                                @php
                                    $criteria_list = null;
                                    if (!empty(json_decode($accreditation_type->criteria))) {
                                        $criteria_list = json_decode($accreditation_type->criteria);
                                        $criteria_list = implode(', ', $criteria_list);
                                    }
                                @endphp
                                <div class="col-sm-3">
                                    <span
                                        class="tag-item">{{ $accreditation_type->credit_type->credit_code ?? '' }}</span>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>{{ $accreditation_type->credit_type->level ?? 'N/A' }}:
                                        </strong>{{ $accreditation_type->level_data ?? 'N/A' }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Pharmacology Amount:
                                        </strong>{{ $accreditation_type->pharmacology_amount ?? 'N/A' }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Criteria: </strong>{{ $criteria_list ?? 'N/A' }}</p>
                                </div>
                                <div class="clear"></div>
                                <br>
                            @endforeach
                        </div>
                    @else
                        <span class="tag-item">N/A</span>
                    @endif
                </div>

                {{-- Accreditation Types end --}}

                <div class="hr-line-dashed"></div>

                {{-- Accreditation Types Non-MLI start --}}
                @php
                    $accreditation_type_non_mli_projects = '';
                    if (!empty($project->accreditation_type_non_mli_projects)) {
                        $accreditation_type_non_mli_projects = $project->accreditation_type_non_mli_projects;
                    }
                @endphp

                <div>
                    <h5>Accreditation Types (Non-MLI)</h5>


                    @if (!empty($accreditation_type_non_mli_projects) && count($accreditation_type_non_mli_projects))
                        <div class="row">
                            @foreach ($accreditation_type_non_mli_projects as $key => $accreditation_type)
                                @php
                                    $criteria_list = null;
                                    if (!empty(json_decode($accreditation_type->criteria))) {
                                        $criteria_list = json_decode($accreditation_type->criteria);
                                        $criteria_list = implode(', ', $criteria_list);
                                    }
                                @endphp
                                <div class="col-sm-3">
                                    <span
                                        class="tag-item">{{ $accreditation_type->credit_type->credit_code ?? '' }}</span>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>{{ $accreditation_type->credit_type->level ?? 'N/A' }}:
                                        </strong>{{ $accreditation_type->level_data ?? 'N/A' }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Pharmacology Amount:
                                        </strong>{{ $accreditation_type->pharmacology_amount ?? 'N/A' }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Criteria: </strong>{{ $criteria_list ?? 'N/A' }}</p>
                                </div>
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Accreditor: </strong>{{ $accreditation_type->accreditor ?? 'N/A' }}
                                    </p>
                                </div>
                                <div class="clear"></div>
                                <br>
                            @endforeach
                        </div>
                    @else
                        <span class="tag-item">N/A</span>
                    @endif
                </div>

                {{-- Accreditation Types end --}}

                <div class="hr-line-dashed"></div>

                {{-- ILNA Code start --}}
                <div>
                    <h5>ILNA Codes </h5>
                    @if ($project->has_ilna)

                        @php
                            $ilna_points = json_decode($project->ilna_points);
                        @endphp


                        <div class="tag-item">
                            <span> <strong> Total Point</strong></span>
                            <span class="pull-right"><strong> {{ $project->ilna_total ?? '0' }}</strong></span>
                        </div>

                        @foreach ($ilna_points as $ilna_point)
                            <div class="tag-item">
                                <span> {{ $ilna_point->subject_area }} </span>
                                <span class="pull-right"> {{ $ilna_point->assigned_point ?? '0' }}</span>
                            </div>
                        @endforeach

                    @else
                        <span class="tag-item">N/A</span>
                    @endif
                </div>

                {{-- ILNA Code end --}}

                <div class="hr-line-dashed"></div>

                {{-- MOC Boards start --}}
                @php
                    $moc_boards = '';
                    if (!empty($project->moc_boards)) {
                        $moc_boards = $project->moc_boards;
                    }
                @endphp

                <div>
                    <h5>MOC/CC Boards</h5>
                    <div class="tag-list" style="padding: 0">
                        @if (count($moc_boards) > 0)
                            @foreach ($moc_boards as $moc_board)
                                <span class="tag-item"> {{ $moc_board->board_code }} </span>
                            @endforeach
                        @else
                            <span class="tag-item">N/A</span>
                        @endif
                    </div>
                </div>

                {{-- MOC Boards end --}}


                <div class="hr-line-dashed"></div>

                {{-- MOC Board Credit Types start --}}
                @php
                    $moc_credit_types = '';
                    if (!empty($project->moc_credit_types)) {
                        $moc_credit_types = $project->moc_credit_types;
                    }
                @endphp


                <div>
                    <h5>MOC/CC Board Credit Types</h5>
                    <div class="tag-list" style="padding: 0">
                        @if (count($moc_credit_types) > 0)
                            @foreach ($moc_credit_types as $moc_credit_type)
                                <span class="tag-item"> {{ $moc_credit_type->credit_type }} </span>
                            @endforeach
                        @else
                            <span class="tag-item">N/A</span>
                        @endif
                    </div>
                </div>

                {{-- MOC Board Credit Types end --}}


                <div class="hr-line-dashed"></div>

                {{-- MOC Board Practices start --}}
                @php
                    $moc_practices = '';
                    if (!empty($project->moc_practices)) {
                        $moc_practices = $project->moc_practices;
                    }
                @endphp


                <div>
                    <h5>MOC/CC Board Practices</h5>
                    <div class="tag-list" style="padding: 0">
                        @if (count($moc_practices) > 0)
                            @foreach ($moc_practices as $moc_practice)
                                <span class="tag-item"> {{ $moc_practice->practice_areas }} </span>
                            @endforeach
                        @else
                            <span class="tag-item">N/A</span>
                        @endif
                    </div>
                </div>

                {{-- MOC Board Practices end --}}

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">

                        <h5>Course Credit Amount</h5>
                        @if (!empty($project->course_credit_amount))
                            <p class="small">
                                {{ $project->course_credit_amount }}
                            </p>
                        @else

                            <p class="small">
                                N/A
                            </p>
                        @endif
                    </div>
                    <div class="col-md-4">

                        <h5>Professional Practice Gap (JAC 4)</h5>
                        @if (!empty($project->meta->practice_gaps))
                            <p class="small">
                                {{ $project->meta->practice_gaps }}
                            </p>
                        @else
                            <p class="small">
                                N/A
                            </p>
                        @endif
                    </div>
                    <div class="col-md-4">

                        <h5>Accreditation Type</h5>
                        @if (!empty($project->accreditation_type_4_ipce))
                            <p class="small">
                                {{ $project->accreditation_type_4_ipce }}
                            </p>
                        @else
                            <p class="small">
                                N/A
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>

                <h5>Educational need(s) (JAC 4)</h5>
                <div class="row">

                <div class="col-md-4">
                    <label for="" class="fs-14">Knowledge need</label>
                    @if (!empty($project->meta->knowledge_need))
                        <p class="small">
                            {{ $project->meta->knowledge_need }}
                        </p>
                    @else
                        <p class="small">N/A</p>
                    @endif
                </div>

                <div class="col-md-4">
                    <label for="" class="fs-14">Skills/Strategy need</label>
                    @if (!empty($project->meta->skills_need))
                        <p class="small">
                            {{ $project->meta->skills_need }}
                        </p>
                    @else
                        <p class="small">N/A</p>
                    @endif
                </div>


                <div class="col-md-4">
                    <label for="" class="fs-14">Performance need</label>
                    @if (!empty($project->meta->performance_need))
                        <p class="small">
                            {{ $project->meta->performance_need }}
                        </p>
                    @else
                        <p class="small">N/A</p>
                    @endif
                </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>MOC/CC</h5>
                        <p class="small">
                            @if ($project->moc == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>OL3 - Knowledge</h5>
                        <p class="small">
                        @if ($project->ol3_knowledge == 1) Yes @else No
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>OL4 - Competence</h5>
                        <p class="small">
                        @if ($project->ol4_competence == 1) Yes @else No
                            @endif
                        </p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>OL5 - Performance</h5>
                        <p class="small">
                        @if ($project->ol5_performance == 1) Yes @else No
                            @endif
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h5>OL6 - Patient Outcomes</h5>
                        <p class="small">
                        @if ($project->ol6_patient_outcomes == 1) Yes @else No
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>OL7 - Community Health</h5>
                        <p class="small">
                        @if ($project->ol7_community_health == 1) Yes @else No
                            @endif
                        </p>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Description</h5>
                        @if (!empty($project->description))
                            <p class="small">
                                {{ $project->description }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>DoA or ED Notes</h5>
                        @if (!empty($project->doa_or_ed_notes))
                            <p class="small">
                                {{ $project->doa_or_ed_notes }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>TA keywords</h5>
                        @if (!empty($project->ta_keywords))
                            <p class="small">
                                {{ $project->ta_keywords }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Change learner's skill/strategy or performance of HCT or patient outcomes (JAC 5)</h5>
                        @if (!empty($project->meta->activity_designed))
                            <p class="small">
                                {{ $project->meta->activity_designed }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>Learning objectives / outcomes</h5>
                        @if (!empty($project->meta->learning_objectives))
                            <p class="small">
                                {{ $project->meta->learning_objectives }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>Valid Content Generation (JAC 6)</h5>
                        @if (!empty($project->meta->ensure_activity))
                            <p class="small">
                                {{ $project->meta->ensure_activity }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>Active learning for the HCT (JAC 7)</h5>
                        @if (!empty($project->meta->educational_format))
                            <p class="small">
                                {{ $project->meta->educational_format }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>Ancillary Support Tools or Strategies (JAC 9)</h5>
                        @if (!empty($project->meta->planned_strategies))
                            <p class="small">
                                {{ $project->meta->planned_strategies }}
                            </p>
                        @else
                            <p class="small">N/A</p>
                        @endif
                    </div>
                </div>

                @if (!empty($project->meta->barriers_strategies))
                    <div class="hr-line-dashed"></div>
                    <h5>Barriers to Change for the HCT (JAC 10)</h5>
                    @php
                        $barriers_strategies = json_decode($project->meta->barriers_strategies);
                    @endphp
                    <ul>
                        @foreach ($barriers_strategies as $barriers_strategy)
                            <li>{{ $barriers_strategy }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="clear"></div>

                <div class="hr-line-dashed"></div>
                <h5>Desirable Attributes of the HCT (JAC 8)</h5>
                
                <div class="row">                   
                    
                    <div class="col-md-6 mt-10">
                        <label for="" class="fs-14">Institute of Medicine Competencies</label>
                        @php $medicine_institutes = (!empty($project->meta->medicine_institutes)) ? json_decode($project->meta->medicine_institutes) : Null; @endphp
                        
                       @if (!empty($medicine_institutes))
                            <ul>
                                @foreach ($medicine_institutes as $medicine_institute)
                                    <li>{{ $medicine_institute }}</li>
                                @endforeach
                            </ul>
                        @else
                        <p><small>N/A</small></p>
                        @endif                       
                    
                    </div>

                    <div class="col-md-6 mt-10">
                        <label for="" class="fs-14">Interprofessional Collaborative Practice</label>
                        @php $collaborative_practices = (!empty($project->meta->collaborative_practices)) ? json_decode($project->meta->collaborative_practices) : Null; @endphp
                        
                       @if (!empty($collaborative_practices))
                            <ul>
                                @foreach ($collaborative_practices as $collaborative_practice)
                                    <li>{{ $collaborative_practice }}</li>
                                @endforeach
                            </ul>
                        @else
                        <p><small>N/A</small></p>
                        @endif                       
                    
                    </div>
                    <div class="clear"></div>

                    <div class="col-md-6 mt-10">
                        <label for="" class="fs-14">ACGME/ABMS Competencies</label>
                        @php $acgme_abms_competencies = (!empty($project->meta->acgme_abms_competencies)) ? json_decode($project->meta->acgme_abms_competencies) : Null; @endphp
                        
                       @if (!empty($acgme_abms_competencies))
                            <ul>
                                @foreach ($acgme_abms_competencies as $acgme_abms_competencie)
                                    <li>{{ $acgme_abms_competencie }}</li>
                                @endforeach
                            </ul>
                        @else
                        <p><small>N/A</small></p>
                        @endif                       
                    
                    </div>

                     <div class="col-md-6 mt-10">
                        <label for="" class="fs-14">National Quality Strategy</label>
                        @php $national_quality_strategy = (!empty($project->meta->national_quality_strategy)) ? json_decode($project->meta->national_quality_strategy) : Null; @endphp
                        
                        @if (!empty($national_quality_strategy))
                            <ul>
                                @foreach ($national_quality_strategy as $national_strategy)
                                    <li>{{ $national_strategy }}</li>
                                @endforeach
                            </ul>
                        @else
                        <p><small>N/A</small></p>
                        @endif                       
                    
                    </div>                
                </div>
                <h5>CAPE Competencies</h5>

                @php $cape_competencies = (!empty($project->meta->cape_competencies)) ? json_decode($project->meta->cape_competencies) : Null;  @endphp
                
                <div class="row">
                    <div class="col-md-4 mt-10">
                        <label for="" class="fs-14">Knowledge</label>                        

                          @if (!empty($cape_competencies->knowledge))
                            <ul>
                                @foreach ($cape_competencies->knowledge as $knowledge)
                                    <li>{{ $knowledge }}</li>
                                @endforeach
                            </ul>
                          @else
                           <p><small>N/A</small></p>
                          @endif
                    </div>

                    <div class="col-md-4 mt-10">
                        <label for="" class="fs-14">Practice and Care Approaches</label>

                          @if (!empty($cape_competencies->practice_and_care_approaches))
                            <ul>
                                @foreach ($cape_competencies->practice_and_care_approaches as $practice_and_care_approach)
                                    <li>{{ $practice_and_care_approach }}</li>
                                @endforeach
                            </ul>
                          @else
                           <p><small>N/A</small></p>
                          @endif
                    </div>

                    <div class="col-md-4 mt-10">
                        <label for="" class="fs-14">Practice and Care Essentials</label>

                          @if (!empty($cape_competencies->practice_and_care_essentials))
                            <ul>
                                @foreach ($cape_competencies->practice_and_care_essentials as $practice_and_care_essentials)
                                    <li>{{ $practice_and_care_essentials }}</li>
                                @endforeach
                            </ul>
                          @else
                            <p><small>N/A</small></p>
                          @endif
                    </div>
                    <div class="clear"></div>
                    <div class="col-md-4 mt-10">
                        <label for="" class="fs-14">Personal and Profesional Development</label>

                          @if (!empty($cape_competencies->personal_and_profesional_development))
                            <ul>
                                @foreach ($cape_competencies->personal_and_profesional_development as $personal_and_profesional_development)
                                    <li>{{ $personal_and_profesional_development }}</li>
                                @endforeach
                            </ul>
                          @else
                          <p><small>N/A</small></p>
                            
                          @endif
                    </div>

                    <div class="col-md-4 mt-10">
                        <label for="" class="fs-14">Other Competency(ies)(specify)</label>

                          @if (!empty($cape_competencies->other_competencies))
                            <p class="small">
                        {{ $project->meta->other_competencies }}
                    </p>
                          @else
                            <small>N/A</small>
                          @endif
                    </div>
                </div>

               

            </div>


            <div class="clear"></div>
        </div>

    </div>
</div>


<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Disclosures</h5>
    </div>

    <div class="ibox-content">
        <div class="row">
            <div class="wrapper wrapper-content project-manager">
                @php
                    $controll_individuals = (!empty($project->meta->controll_individuals)) ? (array) json_decode($project->meta->controll_individuals): [];
                @endphp
                <h5>For all INDIVIDUALS IN CONTROL OF CONTENT for the activity</h5>
                <div class="tableContentWrap">
                    <table id="individualsActivity" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name of individual</th>
                                <th>Individual's role in activity</th>
                                <th>Name of commercial interest</th>
                                <th>Nature of relationship</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($controll_individuals as $controll_individual)
                                <tr>
                                    <td>{{ $controll_individual->name_of_individual ?? 'N/A' }}</td>
                                    <td>{{ $controll_individual->role_in_activity ?? 'N/A' }}</td>
                                    <td>{{ $controll_individual->commercial_interest ?? 'N/A' }}</td>
                                    <td>{{ $controll_individual->nature_of_relationship ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clear"></div>

    </div>

</div>



<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Commercial Support</h5>
    </div>

    <div class="ibox-content">
        <div class="row">
            <div class="col-md-4">
                @if (!empty($project->has_commercial_support))
                    <h5>Commercial Support Received</h5>
                    <p class="small">
                        {{ $project->has_commercial_support }}
                    </p>
                @endif
            </div>
            <div class="clear"></div>
            <div class="wrapper wrapper-content project-manager">

                @php
                    $commercial_supporters = (!empty($project->meta->commercial_supporters)) ? json_decode($project->meta->commercial_supporters): []; 
                @endphp
                @if (!empty($commercial_supporters))
                    <div class="hr-line-dashed"></div>
                    <h5>If the activity was COMMERCIALLY SUPPORTED</h5>

                    <div class="tableContentWrap">
                        <table id="individualsActivity" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name of commercial supporter</th>
                                    <th>Grant Number</th>
                                    <th>Amount $US</th>
                                    <th class="text-center">In-Kind</th>
                                    <th class="text-center">FE-LOA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commercial_supporters as $commercial_supporter)

                                    <tr>
                                        <td>{{ $commercial_supporter->name ?? null }}</td>
                                        <td>{{ $commercial_supporter->grant_id ?? null }}</td>
                                        <td>{{ !empty($commercial_supporter->amount) ? '$' . $commercial_supporter->amount : '' }}
                                        </td>
                                        <td class="text-center">
                                            @if (!empty($commercial_supporter->in_kind) && $commercial_supporter->in_kind == 1)
                                                <i class="fa fa-check text-navy"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (!empty($commercial_supporter->fe_loa) && $commercial_supporter->fe_loa == 1)
                                                <i class="fa fa-check text-navy"></i>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>

        <div class="clear"></div>

    </div>


</div>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Evidence</h5>
    </div>

    <div class="ibox-content">
        <div class="row">

            <div class="wrapper wrapper-content project-manager">


                <div class="form-group" style="margin-bottom: 20px;">
                    <h5>Attachments</h5>
                </div>               

                @php
                    $attachments = json_decode($attachments, true);
                @endphp
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 1 - PNUM_Activity Topic/Content: </span>
                        @if (isset($attachments['attachment-1']))
                            @foreach ($attachments['attachment-1'] as $attachment1)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment1['file']) }}"
                                        target="_blank">{{ $attachment1['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment1['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The activity topic/content, e.g., agenda, brochure, program book, announement,
                            or instructional materials. If this activity is an enduring material, journal-based CE, or
                            Internet CE, please included the actual CE product (or a URL and access code – if
                            applicable) with your performance–in-practice.</p>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 2A- PNUM_Tool to Identify Relevant Financial Relationships: </span>
                       @if (isset($attachments['attachment-2a']))
                            @foreach ($attachments['attachment-2a'] as $attachment2a)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment2a['file']) }}"
                                        target="_blank">{{ $attachment2a['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment2a['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The form, tool, or mechanism used to identify relevant financial relationships of all individuals in control of content. [JAC 12, SCS 2.1] (NOTE: include completed disclosure document of an individual in control of content for this activity.) </p>
                    </div>
                </div>

                 <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 2B - PNUM_Tool to Identify Relevant Financial Relationships: </span>
                       @if (isset($attachments['attachment-2b']))
                            @foreach ($attachments['attachment-2b'] as $attachment2b)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment2b['file']) }}"
                                        target="_blank">{{ $attachment2b['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment2b['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The form, tool, or mechanism used to identify and mitigate relevant financial relationships of all individuals in control of content. [JAC 12, SCS 2.1] (NOTE: See instructions on page 1 - include table or attachment (completed DDF) with relevant financial relationships of all individuals in control of content for this activity.) </p>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 3 - PNUM_Relevance/Absence of Financial Relationships Disclosure Information to Learners: </span>
                       @if (isset($attachments['attachment-3']))
                            @foreach ($attachments['attachment-3'] as $attachment3)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment3['file']) }}"
                                        target="_blank">{{ $attachment3['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment3['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The disclosure information as provided to learners about the relevant financial
                            relationships (or absence of relevant financial relationships) that each individual in a
                            position to control the content of CE disclosure to the provider [JAC 9, SCS 6.1-6.2,6.5]
                        </p>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 4 – PNUM_Changes in Healthcare Team Skills/Strategies or Performance or Patient Outcome: </span>
                       @if (isset($attachments['attachment-4']))
                            @foreach ($attachments['attachment-4'] as $attachment4)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment4['file']) }}"
                                        target="_blank">{{ $attachment4['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment4['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The data or information generated from this activity about changes in the healthcare teams’ skills/strategy or performance and/or patient outcomes
                        </p>
                    </div>
                </div>


                <div class="hr-line-dashed"></div>
                <div class="input-group mb-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 5 – PNUM_Joint Accreditation Statements to Learners: </span>
                          @if (isset($attachments['attachment-5']))
                            @foreach ($attachments['attachment-5'] as $attachment5)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment5['file']) }}"
                                        target="_blank">{{ $attachment5['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment5['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The Joint Accreditation statement for this activity, as provided to learners.
                            [Appropriate Joint Accreditation Statement]
                        </p>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px; margin-top:20px">
                    <h5>If the activity was COMMERCIALLY SUPPORTED...</h5>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 6 – PNUM_Income and Expense: </span>
                        @if (isset($attachments['attachment-6']))
                            @foreach ($attachments['attachment-6'] as $attachment6)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment6['file']) }}"
                                        target="_blank">{{ $attachment6['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment6['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The income and expense statement for this activity that details the receipt and expenditure of all of the commercial support.
                        </p>
                    </div>
                </div>


                <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 7 – PNUM_Fully Executed LOA: </span>
                        @if (isset($attachments['attachment-7']))
                            @foreach ($attachments['attachment-7'] as $attachment7)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment7['file']) }}"
                                        target="_blank">{{ $attachment7['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment7['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">Each executed commercial support agreement for the activity [JAC 9, SCS 3.4-3.6]
                        </p>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Attachment 8 – PNUM_Commercial Support Disclosure Provided to Learners: </span>
                         @if (isset($attachments['attachment-8']))
                            @foreach ($attachments['attachment-8'] as $attachment8)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment8['file']) }}"
                                        target="_blank">{{ $attachment8['file'] }}</a>
                                        <span class="ml-2 badge badge-warning">{{ $attachment8['status'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <strong>N/A</strong>
                        @endif
                        <p class="mt-3">The commercial support disclosure information as provided to learners [JAC 9,
                            SCS 6.3-6.5]</p>
                    </div>
                </div>

                <div class="form-group mb-5" style="margin-top: 60px;">
                    <h5>Joint Accreditation Commendation Criteria</h5>
                </div>

                <div class="hr-line-dashed"></div>

                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 13</h5>
                        <p class="small">
                            @if ($project->jac13 == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac13_description && !empty($project->jac13) && $project->jac13 == 1))
                            <h5>JAC 13 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac13_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    @if (!empty($project->meta->jac13_patient_planner && !empty($project->jac13) && $project->jac13 == 1))
                        <div class="col-md-4">
                            <h5>Patient Planner</h5>
                            <p class="small">
                                {{ $project->meta->jac13_patient_planner }}
                            </p>
                        </div>
                    @endif

                    @if (!empty($project->meta->jac13_patient_presenter && !empty($project->jac13) && $project->jac13 == 1))
                        <div class="col-md-4">
                            <h5>Patient Presenter</h5>
                            <p class="small">
                                {{ $project->meta->jac13_patient_presenter }}
                            </p>
                        </div>
                    @endif

                    @if (!empty($project->meta->jac13_mechanism && !empty($project->jac13) && $project->jac13 == 1))
                        <div class="col-md-4">
                            <h5>Mechanism Used</h5>
                            <p class="small">
                                {{ $project->meta->jac13_mechanism }}
                            </p>
                        </div>
                    @endif
                </div>

                <div class="hr-line-dashed"></div>

                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 14</h5>
                        <p class="small">
                            @if ($project->jac14 == 1) Yes @else No @endif
                        </p>
                    </div>
                    @if (!empty($project->meta->jac14_description && !empty($project->jac14) && $project->jac14 == 1))
                        <div class="col-md-4">
                            <h5>JAC 14 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac14_description }}
                            </p>
                        </div>
                    @endif
                </div>

                <div class="row">
                    @if (!empty($project->meta->jac14_patient_planner && !empty($project->jac14) && $project->jac14 == 1))
                        <div class="col-md-4">
                            <h5>Patient Planner</h5>
                            <p class="small">
                                {{ $project->meta->jac14_patient_planner }}
                            </p>
                        </div>
                    @endif

                    @if (!empty($project->meta->jac14_patient_presenter && !empty($project->jac14) && $project->jac14 == 1))
                        <div class="col-md-4">
                            <h5>Patient Presenter</h5>
                            <p class="small">
                                {{ $project->meta->jac14_patient_presenter }}
                            </p>
                        </div>
                    @endif

                    @if (!empty($project->meta->jac14_mechanism && !empty($project->jac14) && $project->jac14 == 1))
                        <div class="col-md-4">
                            <h5>Mechanism Used</h5>
                            <p class="small">
                                {{ $project->meta->jac14_mechanism }}
                            </p>
                        </div>
                    @endif
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 16</h5>
                        <p class="small">
                            @if ($project->jac16 == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac16_description && !empty($project->jac16) && $project->jac16 == 1))
                            <h5>JAC 16 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac16_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 17</h5>
                        <p class="small">
                            @if ($project->jac17 == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac16_description && !empty($project->jac17) && $project->jac17 == 1))
                            <h5>JAC 17 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac17_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 18</h5>
                        <p class="small">
                            @if ($project->jac18 == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac18_description && !empty($project->jac18) && $project->jac18 == 1))
                            <h5>JAC 18 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac18_description }}
                            </p>
                        @endif
                    </div>

                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 19</h5>
                        <p class="small">
                            @if ($project->jac19 == 1) Yes @else No @endif
                        </p>

                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac19_description && !empty($project->jac19) && $project->jac19 == 1))
                            <h5>JAC 19 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac19_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 20</h5>
                        <p class="small">
                            @if ($project->jac20 == 1) Yes @else No @endif
                        </p>

                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac20_description && !empty($project->jac20) && $project->jac20 == 1))
                            <h5>JAC 20 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac20_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 21</h5>
                        <p class="small">
                            @if ($project->jac21 == 1) Yes @else No @endif
                        </p>

                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac21_description && !empty($project->jac21) && $project->jac21 == 1))
                            <h5>JAC 21 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac21_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 22</h5>
                        <p class="small">
                            @if ($project->jac22 == 1) Yes @else No @endif
                        </p>

                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac22_description && !empty($project->jac22) && $project->jac22 == 1))
                            <h5>JAC 22 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac22_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 23</h5>
                        <p class="small">
                            @if ($project->jac23 == 1) Yes @else No @endif
                        </p>

                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac23_description && !empty($project->jac23) && $project->jac23 == 1))
                            <h5>JAC 23 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac23_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 24</h5>
                        <p class="small">
                            @if ($project->jac24 == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac24_description && !empty($project->jac24) && $project->jac24 == 1))
                            <h5>JAC 24 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac24_description }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>JAC 25</h5>
                        <p class="small">
                            @if ($project->jac25 == 1) Yes @else No @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        @if (!empty($project->meta->jac25_description && !empty($project->jac25) && $project->jac25 == 1))
                            <h5>JAC 25 Description</h5>
                            <p class="small">
                                {{ $project->meta->jac25_description }}
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="clear"></div>

    </div>

</div>
