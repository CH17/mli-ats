<div class="panel-body">

    <form id="eForm" action="{{ route('project.update', ['project' => $project->id]) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <fieldset>
    <div class="ibox-title">
        <h5>Basic Information</h5>
        <span class="pull-right"><button class='btn btn-md btn-primary' type="submit"> Update</button></span>
        <div class="clear"></div>
    </div>

    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="activity_title">Activity Title</label>
                                <div class="form-group">
                                    <input name="activity_title" type="text" class="form-control"
                                        placeholder="Activity Title" value="{{ $project->activity_title }}">
                                    <div class="error_activity_title error_message"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>ATS ID</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $project->id }}" @if (!empty($project->id)) readonly @endif>
                                </div>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="activity_url">Activity URL</label>
                                <div class="form-group">
                                    <input name="activity_url" type="text" class="form-control"
                                        placeholder="Activity URL" value="{{ $project->activity_url }}">
                                    <div class="error_activity_url error_message"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="providership">Activity Providership</label>
                                <div class="form-group">
                                    <select id="Providership" class="form-control chosen-select" name="providership"
                                        data-placeholder="(Select one)">
                                        <option selected></option>
                                        <option value="Direct" @if ($project->providership == 'Direct') selected @endif>Direct
                                        </option>
                                        <option value="Joint" @if ($project->providership == 'Joint') selected @endif>Joint
                                        </option>
                                    </select>
                                </div>
                            </div>

                            

                            @php
                                $provider = '';
                                if (!empty($project->joint_provider)) {
                                    $provider = $project->joint_provider;
                                }
                            @endphp
                            <div class="form-group col-md-3 JP @if ($project->providership ==
                                'Direct') d-none @endif">
                                <label for="jp_id">Joint Provider</label>
                                <div class="form-group">
                                    <select id="EditJointProvider" class="form-control chosen-select"
                                        project_id="{{ $project->id }}" name="jp_id" data-placeholder="(Select one)">
                                        <option selected></option>
                                        @foreach ($joint_providers as $joint_provider)
                                            <option value="{{ $joint_provider->id }}" @if (!empty($provider) && $provider->id == $joint_provider->id) selected @endif>{{ $joint_provider->jp_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php
                                $jp_contacts_arr = [];
                                $jp_contact_projects = $project->jp_contacts;
                                if (!empty($jp_contact_projects)) {
                                    foreach ($jp_contact_projects as $jp_contact) {
                                        $jp_contacts_arr[] = $jp_contact->id;
                                    }
                                }
                            @endphp
                            <div id="EditJPContacts" class="form-group col-md-3 @if ($project->
                                providership == 'Direct') d-none @endif">
                                <label for="jp_contact">JP Contact</label>
                                <div class="form-group">
                                    <select id="jp_contacts" class="form-control chosen-select" name="jp_contact_id[]"
                                        data-placeholder="Select one/multiple JP contact" multiple>
                                        @foreach ($jp_contacts as $jp_contact)
                                            <option value="{{ $jp_contact->id }}" @if (count($jp_contacts_arr) > 0 && in_array($jp_contact->id, $jp_contacts_arr)) selected @endif>{{ $jp_contact->contact_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="JP_CR_Code" class="form-group col-md-3 @if ($project->
                                providership == 'Direct') d-none @endif">
                                <label>JP CR Code</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $project->jp_cr_code }}"
                                        name="jp_cr_code">
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="form-group col-md-4">
                                <label>Activity ID</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $project->activity_id }}"
                                        name="activity_id">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>MLI PNUM</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $project->project_code }}"
                                        name="project_code">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="activity_type" class="font-noraml">Activity Type</label>
                                <select id="activity_type" class="form-control chosen-select" name="activity_type"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    <option value="Course" @if ($project->activity_type == 'Course') selected @endif>Course
                                    </option>
                                    <option value="Regularly Scheduled Series" @if ($project->activity_type == 'Regularly Scheduled Series') selected @endif>Regularly Scheduled Series</option>
                                    <option value="Internet Live Course" @if ($project->activity_type == 'Internet Live Course') selected @endif>Internet Live Course</option>
                                    <option value="Enduring Material" @if ($project->activity_type == 'Enduring Material') selected @endif>Enduring Material</option>
                                    <option value="Internet Activity Enduring Material" @if ($project->activity_type == 'Internet Activity Enduring Material') selected @endif>Internet
                                        Activity Enduring Material</option>
                                    <option value="Journal-based CME" @if ($project->activity_type == 'Journal-based CME') selected @endif>Journal-based CME</option>
                                    <option value="Manuscript Review" @if ($project->activity_type == 'Manuscript Review') selected @endif>Manuscript Review</option>
                                    <option value="Test Item Writing" @if ($project->activity_type == 'Test Item Writing') selected @endif>Test Item Writing</option>
                                    <option value="Committee Learning" @if ($project->activity_type == 'Committee Learning') selected @endif>Committee Learning</option>
                                    <option value="Performance Improvement" @if ($project->activity_type == 'Performance Improvement') selected @endif>Performance Improvement</option>
                                    <option value="Internet Searching and Learning" @if ($project->activity_type == 'Internet Searching and Learning') selected @endif>Internet Searching and Learning</option>
                                    <option value="Learning from Teaching" @if ($project->activity_type == 'Learning from Teaching') selected @endif>Learning from Teaching</option>
                                    <option value="Other (Hybrid – Course and Internet Live Course)" @if ($project->activity_type == 'Other (Hybrid – Course and Internet Live Course)') selected @endif>Other (Hybrid – Course and Internet Live Course)</option>                                    
                                </select>
                            </div>
                            <div class="clear"></div>

                            <div class="form-group col-md-4" id="data_1">
                                <label class="font-noraml">Start Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                        type="text" class="form-control" id="fromDate" name="start_date"
                                        value="{{ date('m/d/Y', strtotime($project->start_date)) }}">
                                    <div class="error_start_date error_message"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-4" id="data_1">
                                <label class="font-noraml">Expiration Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                        type="text" class="form-control" id="toDate" name="expiration_date"
                                        value="{{ date('m/d/Y', strtotime($project->expiration_date)) }}">
                                    <div class="error_expiration_date error_message"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="course_credit_amount">Course Credit Amount</label>
                                <div class="form-group">
                                    <input name="course_credit_amount" type="text"
                                        value="{{ $project->course_credit_amount }}" class="form-control"
                                        placeholder="Course Credit Amount">
                                    <div class="error_course_credit_amount error_message"></div>
                                </div>
                            </div>

                            <div class="clear"></div>
                            <hr>
                            <div class="form-group col-md-3">
                                <label for="jp_2">Joint Provider 2</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_2_edit" type="radio" name="has_jp_2"
                                                value="1" @if ($project->has_jp_2 == 1) checked @endif>
                                            <label class="form-check-label" for="has_jp_2">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_2_edit" type="radio" name="has_jp_2"
                                                value="0" @if ($project->has_jp_2 == 0) checked @endif>
                                            <label class="form-check-label" for="has_jp_2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $provider2 = '';
                                if (!empty($project->joint_provider_2)) {
                                    $provider2 = $project->joint_provider_2;
                                }
                            @endphp
                            <div class="form-group col-md-3 EditJP2 @if ($project->has_jp_2 ==
                                0) d-none @endif">
                                <label for="jp_id_2">Joint Provider 2</label>
                                <div class="form-group">
                                    <select id="EditJointProvider2" class="form-control chosen-select"
                                        project_id="{{ $project->id }}" name="jp_id_2"
                                        data-placeholder="(Select one)">
                                        <option selected></option>
                                        @foreach ($joint_providers as $joint_provider)
                                            <option value="{{ $joint_provider->id }}" @if (!empty($provider2) && $provider2->id == $joint_provider->id) selected @endif>{{ $joint_provider->jp_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php
                                $jp2_contacts_arr = [];
                                $jp2_contact_projects = $project->jp_contacts_2;
                                if (!empty($jp2_contact_projects)) {
                                    foreach ($jp2_contact_projects as $jp_contact) {
                                        $jp2_contacts_arr[] = $jp_contact->id;
                                    }
                                }
                            @endphp
                            <div id="EditJPContacts2" class="form-group col-md-3 @if ($project->
                                has_jp_2 == 0) d-none @endif">
                                <label for="jp2_contact">JP Contact 2</label>
                                <div class="form-group">
                                    <select id="jp2_contacts" class="form-control chosen-select"
                                        name="jp_contact_id_2[]" data-placeholder="Select one/multiple JP contact"
                                        multiple>
                                        @foreach ($jp2_contacts as $jp_contact)
                                            <option value="{{ $jp_contact->id }}" @if (count($jp2_contacts_arr) > 0 && in_array($jp_contact->id, $jp2_contacts_arr)) selected @endif>
                                                {{ $jp_contact->contact_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="JP_CR_Code_2" class="form-group col-md-3 @if ($project->
                                has_jp_2 == 0) d-none @endif">
                                <label>JP CR Code 2</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{ $project->jp_cr_code_2 ?? '' }}" name="jp_cr_code_2">
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="form-group col-md-3">
                                <label for="jp_3">Joint Provider 3</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_3_edit" type="radio" name="has_jp_3"
                                                value="1" @if ($project->has_jp_3 == 1) checked @endif>
                                            <label class="form-check-label" for="has_jp_3">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input has_jp_3_edit" type="radio" name="has_jp_3"
                                                value="0" @if ($project->has_jp_3 == 0) checked @endif>
                                            <label class="form-check-label" for="has_jp_3">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $provider3 = '';
                                if (!empty($project->joint_provider_3)) {
                                    $provider3 = $project->joint_provider_3;
                                }
                            @endphp
                            <div class="form-group col-md-3 EditJP3 @if ($project->has_jp_3 ==
                                0) d-none @endif">
                                <label for="jp_id_3">Joint Provider 3</label>
                                <div class="form-group">
                                    <select id="EditJointProvider3" class="form-control chosen-select"
                                        project_id="{{ $project->id }}" name="jp_id_3"
                                        data-placeholder="(Select one)">
                                        <option selected></option>
                                        @foreach ($joint_providers as $joint_provider)
                                            <option value="{{ $joint_provider->id }}" @if (!empty($provider3) && $provider3->id == $joint_provider->id) selected @endif>{{ $joint_provider->jp_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php
                                $jp3_contacts_arr = [];
                                $jp3_contact_projects = $project->jp_contacts_3;
                                if (!empty($jp3_contact_projects)) {
                                    foreach ($jp3_contact_projects as $jp_contact) {
                                        $jp3_contacts_arr[] = $jp_contact->id;
                                    }
                                }
                            @endphp
                            <div id="EditJPContacts3" class="form-group col-md-3 @if ($project->
                                has_jp_3 == 0) d-none @endif">
                                <label for="jp3_contact">JP Contact 3</label>
                                <div class="form-group">
                                    <select id="jp3_contacts" class="form-control chosen-select"
                                        name="jp_contact_id_3[]" data-placeholder="Select one/multiple JP contact"
                                        multiple>
                                        @foreach ($jp3_contacts as $jp_contact)
                                            <option value="{{ $jp_contact->id }}" @if (count($jp3_contacts_arr) > 0 && in_array($jp_contact->id, $jp3_contacts_arr)) selected @endif>
                                                {{ $jp_contact->contact_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="JP_CR_Code_3" class="form-group col-md-3 @if ($project->
                                has_jp_3 == 0) d-none @endif">
                                <label>JP CR Code 3</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{ $project->jp_cr_code_3 ?? '' }}" name="jp_cr_code_3">
                                </div>
                            </div>
                            <div class="clear"></div>

                            @include('backend.project.template.edit-template.ep-contact')

                           <div class="clear"></div>
                            <div class="form-group col-md-3">
                                <label for="collaborating_org">Collaborating Organization</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="is_collaborating_org_1"
                                                name="is_collaborating_org" value="1" @if ($project->is_collaborating_org == 1) checked @endif>
                                            <label class="form-check-label" for="is_collaborating_org_1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="is_collaborating_org_2"
                                                name="is_collaborating_org" value="0" @if ($project->is_collaborating_org == 0) checked @endif>
                                            <label class="form-check-label" for="is_collaborating_org_2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="collaborating_org_name" class="col-form-label">Collaborating Organization
                                    Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="collaborating_org_name"
                                        value="{{ $project->collaborating_org_name }}">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        

                        {{-- Target Audiences --}}
                        @php
                            $target_audience = [];
                            if (!empty($project->audience_types)) {
                                foreach ($project->audience_types as $data) {
                                    array_push($target_audience, $data->audience_type);
                                }
                            }
                        @endphp
                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3">
                                <label for="target_audience">Target Audience for Activity</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    @if (!empty($audience_types))
                                        @foreach ($audience_types as $audience_type)
                                            <div class="col-md-4">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="target_audience[]" value="{{ $audience_type->id }}" @if (in_array($audience_type->audience_type, $target_audience)) checked @endif>
                                                    <label class="form-check-label"
                                                        for="{{ $audience_type->audience_type }}">{{ $audience_type->audience_type }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="col-md-4">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" name="target_audience[]"
                                                id="other_members" value="Other members" @if (isset($project->meta->target_audience_other_reason)) checked @endif>
                                            <label class="form-check-label" for="other_members">Other members</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4 @if (isset($project->
                            meta->target_audience_other_reason)) d-none @endif specify">
                            <div class="col-md-3">
                                <label for="specify">Please Specify</label>
                            </div>
                            <div class="col-md-9">
                                <input name="target_audience_other_reason" type="text" class="form-control"
                                    placeholder="Please Specify"
                                    value="{{ $project->meta->target_audience_other_reason }}">
                                <div class="error_target_audience_other_reason error_message"></div>
                            </div>
                        </div>



                        {{-- Accreditation Types --}}

                        @php
                            $accreditation_type = [];
                            if (!empty($project->accreditation_types)) {
                                foreach ($project->accreditation_types as $data) {
                                    array_push($accreditation_type, $data->credit_code);
                                }
                            }
                        @endphp

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-2">
                                <label for="accreditation_types">Accreditation Type</label>
                                <div class="EditAccreditationBox MainBox"
                                    ondrop="drop(event, 'Accreditation', {{ $project->id }})"
                                    ondragover="allowDrop(event)">
                                    @foreach ($credit_types as $credit_type)
                                        <span class="edit-tag-item" ondragstart="dragStart(event)" draggable="true"
                                            id="{{ $credit_type->id }}">
                                            {{ $credit_type->credit_code }}
                                        </span>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-12">
                                    <label for="accreditation_types">MLI</label>
                                    <div class="EditAccreditationBox MLIBox"
                                        ondrop="drop(event, 'MLI', {{ $project->id }})"
                                        ondragover="allowDrop(event)">

                                        @foreach ($credit_types as $credit_type)
                                            <div class="row col-md-12">
                                                <div class="col-md-2">
                                                    <div id="editAccreditationType-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_type) && in_array($credit_type->credit_code, $accreditation_type))
                                                            <div class="row Type"
                                                                id="editAccreditationTypeData-{{ $credit_type->id }}">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="accreditation_types[]"
                                                                        value="{{ $credit_type->id }}">
                                                                    <input type="hidden" name="mli[]" value="1">
                                                                    <span class="edit-tag-item"
                                                                        ondragstart="dragStart(event)" draggable="true"
                                                                        id="{{ $credit_type->id }}">
                                                                        {{ $credit_type->credit_code }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div id="editLevelText-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_type) && in_array($credit_type->credit_code, $accreditation_type))
                                                            <div id="editLevelTextData-{{ $credit_type->id }}">
                                                                @if (!empty($credit_type->level))
                                                                    <label
                                                                        for="level">{{ $credit_type->level }}</label>
                                                                    <div class="form-group">
                                                                        <input
                                                                            name="level_data_{{ $credit_type->id }}"
                                                                            type="text" class="form-control"
                                                                            placeholder="" @if (!empty(
        $credit_type->accreditation_types->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()
    )) value="{{ $credit_type->accreditation_types->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->level_data }}" @endif>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div id="editCriteria-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_type) && in_array($credit_type->credit_code, $accreditation_type))
                                                            <div class="row"
                                                                id="editCriteriaData-{{ $credit_type->id }}">
                                                                @php
                                                                    $credit_cri_arr = null;
                                                                    if (!empty($credit_type->criteria)) {
                                                                        $credit_cri_arr = json_decode($credit_type->criteria);
                                                                    }
                                                                    $criteria_array = null;
                                                                    if (
                                                                        !empty(
                                                                            $credit_type->accreditation_types
                                                                                ->where('credit_type_id', $credit_type->id)
                                                                                ->where('project_id', $project->id)
                                                                                ->first()
                                                                        )
                                                                    ) {
                                                                        $criteria_array = json_decode(
                                                                            $credit_type->accreditation_types
                                                                                ->where('credit_type_id', $credit_type->id)
                                                                                ->where('project_id', $project->id)
                                                                                ->first()->criteria,
                                                                        );
                                                                    }
                                                                @endphp
                                                                @foreach ($criteria_list as $key => $criteria)
                                                                    @if (!empty($credit_cri_arr) && in_array($key, $credit_cri_arr))
                                                                        <div class="col-md-4">
                                                                            <div
                                                                                class="checkbox-block checkbox checkbox-primary form-group">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="criteria_{{ $credit_type->id }}_{{ $loop->index }}"
                                                                                    name="criteria_{{ $credit_type->id }}[]"
                                                                                    value="{{ $key }}" @if (!empty($criteria_array) && in_array($key, $criteria_array)) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="criteria_{{ $credit_type->id }}_{{ $loop->index }}">{{ $key }}</label>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div id="editPharmacologyAmount-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_type) && in_array($credit_type->credit_code, $accreditation_type))
                                                            <div id="editPharmacologyData-{{ $credit_type->id }}">
                                                                @if (!empty($credit_type->has_pharmacology_amount) && $credit_type->has_pharmacology_amount == 1)
                                                                    <label for="pharmacology_amount">Pharmacology
                                                                        Amount</label>
                                                                    <div class="form-group">
                                                                        <input
                                                                            name="pharmacology_amount{{ $credit_type->id }}"
                                                                            type="text" class="form-control"
                                                                            placeholder="" @if (!empty(
        $credit_type->accreditation_types->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()
    )) value="{{ $credit_type->accreditation_types->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->pharmacology_amount }}" @endif>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            @if (!empty($accreditation_type) && in_array($credit_type->credit_code, $accreditation_type))
                                                <div class="BoxHR" id="BoxHR{{ $credit_type->id }}">
                                                    <hr>
                                                </div>
                                            @else
                                                <div class="BoxHR d-none" id="BoxHR{{ $credit_type->id }}">
                                                    <hr>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="clear"></div>
                                    </div>
                                </div>

                                {{-- Accreditation Types Non Mli --}}

                                @php
                                    $accreditation_types_non_mli = [];
                                    if (!empty($project->accreditation_types_non_mli)) {
                                        foreach ($project->accreditation_types_non_mli as $data) {
                                            array_push($accreditation_types_non_mli, $data->credit_code);
                                        }
                                    }
                                @endphp
                                <div class="col-md-12 mb-3 mt-3">
                                    <label for="accreditation_types">Non-MLI</label>
                                    <div class="EditAccreditationBox NonMLIBox" id="NonMLI" root=false
                                        ondrop="drop(event, 'NonMLI', {{ $project->id }})"
                                        ondragover="allowDrop(event)">
                                        @foreach ($credit_types as $credit_type)
                                            <div class="row col-md-12">
                                                <div class="col-md-2">
                                                    <div id="editAccreditationTypeNonMli-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_types_non_mli) && in_array($credit_type->credit_code, $accreditation_types_non_mli))
                                                            <div class="row Type"
                                                                id="editAccreditationTypeNonMliData-{{ $credit_type->id }}">
                                                                <div class="form-group">
                                                                    <input type="hidden"
                                                                        name="accreditation_types_non_mli[]"
                                                                        value="{{ $credit_type->id }}">
                                                                    <input type="hidden" name="non_mli[]" value="0">
                                                                    <span class="edit-tag-item"
                                                                        ondragstart="dragStart(event)" draggable="true"
                                                                        id="{{ $credit_type->id }}">
                                                                        {{ $credit_type->credit_code }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if (!empty($accreditation_types_non_mli) && in_array($credit_type->credit_code, $accreditation_types_non_mli))
                                                    <div class="col-md-4">
                                                        <div id="editLevelTextNonMli-{{ $credit_type->id }}">
                                                            <div id="editLevelTextNonMliData-{{ $credit_type->id }}">

                                                                <div
                                                                    id="editLevelTextNonMliData-{{ $credit_type->id }}">
                                                                    @if (!empty($credit_type->level))
                                                                        <label
                                                                            for="level">{{ $credit_type->level }}</label>
                                                                        <div class="form-group">
                                                                            <input
                                                                                name="non_mli_level_data_{{ $credit_type->id }}"
                                                                                type="text" class="form-control"
                                                                                placeholder="" @if (!empty(
        $credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()
    )) value="{{ $credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->level_data }}" @endif>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-2">
                                                    <div id="editCriteriaNonMli-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_types_non_mli) && in_array($credit_type->credit_code, $accreditation_types_non_mli))
                                                            <div class="row"
                                                                id="editCriteriaNonMliData-{{ $credit_type->id }}">
                                                                @php
                                                                    $credit_cri_arr = null;
                                                                    if (!empty($credit_type->criteria)) {
                                                                        $credit_cri_arr = json_decode($credit_type->criteria);
                                                                    }
                                                                    $criteria_array = null;
                                                                    if (
                                                                        !empty(
                                                                            $credit_type->accreditation_types_non_mli
                                                                                ->where('credit_type_id', $credit_type->id)
                                                                                ->where('project_id', $project->id)
                                                                                ->first()
                                                                        )
                                                                    ) {
                                                                        $criteria_array = json_decode(
                                                                            $credit_type->accreditation_types_non_mli
                                                                                ->where('credit_type_id', $credit_type->id)
                                                                                ->where('project_id', $project->id)
                                                                                ->first()->criteria,
                                                                        );
                                                                    }
                                                                @endphp
                                                                @foreach ($criteria_list as $key => $criteria)
                                                                    @if (!empty($credit_cri_arr) && in_array($key, $credit_cri_arr))
                                                                        <div class="col-md-4">
                                                                            <div
                                                                                class="checkbox-block checkbox checkbox-primary form-group">
                                                                                <input class="form-check-input"
                                                                                    id="non_mli_criteria_{{ $credit_type->id }}_{{ $loop->index }}"
                                                                                    type="checkbox"
                                                                                    name="non_mli_criteria_{{ $credit_type->id }}[]"
                                                                                    value="{{ $key }}" @if (!empty($criteria_array) && in_array($key, $criteria_array)) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="non_mli_criteria_{{ $credit_type->id }}_{{ $loop->index }}">{{ $key }}</label>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div id="editPharmacologyAmountNonMli-{{ $credit_type->id }}">
                                                        @if (!empty($accreditation_types_non_mli) && in_array($credit_type->credit_code, $accreditation_types_non_mli))
                                                            <div
                                                                id="editPharmacologyNonMliData-{{ $credit_type->id }}">
                                                                @if (!empty($credit_type->has_pharmacology_amount) && $credit_type->has_pharmacology_amount == 1)
                                                                    <label for="pharmacology_amount">Pharmacology
                                                                        Amount</label>
                                                                    <div class="form-group">
                                                                        <input
                                                                            name="non_mli_pharmacology_amount{{ $credit_type->id }}"
                                                                            type="text" class="form-control"
                                                                            placeholder="" @if (!empty(
        $credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()
    )) value="{{ $credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->pharmacology_amount }}" @endif>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div id="editAccreditorNonMli-{{ $credit_type->id }}">
                                                        <div id="editAccreditorNonMliData-{{ $credit_type->id }}">
                                                            @if (!empty($accreditation_types_non_mli) && in_array($credit_type->credit_code, $accreditation_types_non_mli))
                                                                <div
                                                                    id="editAccreditorNonMliData-{{ $credit_type->id }}">
                                                                    <label for="level">Accreditor</label>
                                                                    <div class="form-group">
                                                                        <input
                                                                            name="non_mli_accreditor_{{ $credit_type->id }}"
                                                                            type="text" class="form-control"
                                                                            placeholder="" @if (!empty(
        $credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()
    )) value="{{ $credit_type->accreditation_types_non_mli->where('credit_type_id', $credit_type->id)->where('project_id', $project->id)->first()->accreditor }}" @endif>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            @if (!empty($accreditation_types_non_mli) && in_array($credit_type->credit_code, $accreditation_types_non_mli))
                                                <div class="BoxHR" id="BoxHRNonMli{{ $credit_type->id }}">
                                                    <hr>
                                                </div>
                                            @else
                                                <div class="BoxHR d-none" id="BoxHRNonMli{{ $credit_type->id }}">
                                                    <hr>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3 mt-3">

                        </div>

                        <hr>

                        {{-- MOC --}}

                        <div class="form-group row mb-3 mt-3" id="EditMOC">
                            <div class="col-md-3"><label for="moc">MOC/CC</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input EditMOC" type="radio" id="moc_1" name="moc"
                                                value="1" @if ($project->moc == 1) checked @endif>
                                            <label class="form-check-label" for="moc_1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input EditMOC" type="radio" name="moc" id="moc_2"
                                                value="0" @if ($project->moc == 0) checked @endif>
                                            <label class="form-check-label" for="moc_2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- MOC Boards --}}

                        @php
                            $moc_boards_data = [];
                            if (!empty($project->moc_boards)) {
                                foreach ($project->moc_boards as $data) {
                                    array_push($moc_boards_data, $data->board_code);
                                }
                            }
                        @endphp


                        <div @if ($project->moc == 0) class="d-none" @endif id="EditMocBoards">
                            <hr>
                            <div class="form-group row  mb-3 mt-3">
                                <div class="col-md-3"><label for="moc_boards">MOC/CC Boards</label></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($moc_boards as $moc_board)
                                            <div class="col-md-4">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="form-check-input edit_moc_boards" type="checkbox"
                                                        project_id="{{ $project->id }}" name="moc_boards[]"
                                                        value="{{ $moc_board->id }}" @if (!empty($moc_boards_data) && in_array($moc_board->board_code, $moc_boards_data)) checked @endif>
                                                    <label class="form-check-label"
                                                        for="{{ $moc_board->board_code }}">{{ $moc_board->board_code }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="MocView" @if ($project->moc == 0) class="d-none" @endif>
                            @php
                                $moc_credit_types_data = [];
                                if (!empty($project->moc_credit_types)) {
                                    foreach ($project->moc_credit_types as $data) {
                                        array_push($moc_credit_types_data, $data->credit_type);
                                    }
                                }
                                
                                $moc_practices_data = [];
                                if (!empty($project->moc_practices)) {
                                    foreach ($project->moc_practices as $data) {
                                        array_push($moc_practices_data, $data->practice_areas);
                                    }
                                }
                            @endphp

                            @if (!empty($project->moc_boards))
                                @foreach ($project->moc_boards as $moc_board)
                                    <div id="edit-moc-board-{{ $moc_board->id }}">
                                        <hr>
                                        <div class="form-group row mb-3 mt-3">
                                            <div class="col-md-3"><label
                                                    for="moc_credit_types">{{ $moc_board->board_code }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if (!empty($moc_board->moc_credit_type))
                                                            @foreach ($moc_board->moc_credit_type as $moc_credit_type)
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="moc_credit_types[]"
                                                                        value="{{ $moc_credit_type->id }}" @if (!empty($moc_credit_types_data) && in_array($moc_credit_type->credit_type, $moc_credit_types_data)) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="{{ $moc_credit_type->credit_type }}">{{ $moc_credit_type->credit_type }}</label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if (!empty($moc_board->moc_practice))
                                                            @foreach ($moc_board->moc_practice as $moc_practice)
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="moc_practices[]"
                                                                        value="{{ $moc_practice->id }}" @if (!empty($moc_practices_data) && in_array($moc_practice->practice_areas, $moc_practices_data)) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="{{ $moc_practice->practice_areas }}">{{ $moc_practice->practice_areas }}</label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>



                        <hr>

                        {{-- ILNA Coding --}}

                        <div class="form-group row mb-3 mt-3" id="EditILNACoding_block">
                            <div class="col-md-3"><label for="moc">ILNA Coding</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input EditILNACoding" type="radio"
                                                id="ilna_coding_1" name="ilna_coding" value="1" @if ($project->has_ilna === 1) checked @endif>
                                            <label class="form-check-label" for="ilna_coding_1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input EditILNACoding" type="radio"
                                                name="ilna_coding" id="ilna_coding_2" value="0" @if ($project->has_ilna === 0) checked @endif>
                                            <label class="form-check-label" for="ilna_coding_2">No</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="text-group">
                                            <label for="ilna_total_points" class="col-form-label">Total Points</label>
                                            <input type="text" class="form-control" name="ilna_total_points"
                                                id="ilna_total_points" value="{{ $project->ilna_total }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row  @if ($project->has_ilna == 0) d-none @endif" id="EditIlnaCodeItems">

                            @php
                                $ilna_items = json_decode($project->ilna_points);
                                $ilna_arr = ((array) $ilna_items);
                            @endphp


                            <div class=" col-md-8">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ILNA Subject Area</th>
                                            <th scope="col">Assigned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($ilna_codes))
                                            @foreach ($ilna_codes as $ilna_code)
                                                <tr>
                                                    <td><label for="{{ $ilna_code->slug }}" class="col-form-label">
                                                            {{ $ilna_code->subject_area }} </label> </td>
                                                    <td>
                                                        @if (isset($ilna_arr["$ilna_code->id"]->assigned_point))
                                                            <input type="number" class="form-control ilna_item"
                                                                name="ilna_item[{{ $ilna_code->id }}][assigned_point]"
                                                                id="{{ $ilna_code->slug }}" step="0.001"
                                                                value='{{ $ilna_arr["$ilna_code->id"]->assigned_point }}'>
                                                        @else
                                                            <input type="number" class="form-control ilna_item"
                                                                name="ilna_item[{{ $ilna_code->id }}][assigned_point]"
                                                                id="{{ $ilna_code->slug }}" step="0.001" value=''>
                                                        @endif

                                                        <input type="hidden"
                                                            name="ilna_item[{{ $ilna_code->id }}][subject_area]"
                                                            value='{{ $ilna_code->subject_area }}'>

                                                        <input type="hidden"
                                                            name="ilna_item[{{ $ilna_code->id }}][slug]"
                                                            value='{{ $ilna_code->slug }}'>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- ILNA Coding --}}


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="ol3_knowledge">Outcome Level</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol3_knowledge"
                                                name="ol3_knowledge" value="1" @if ($project->ol3_knowledge == 1) checked @endif>
                                            <label class="form-check-label" for="ol3_knowledge">3</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol4_competence"
                                                name="ol4_competence" value="1" @if ($project->ol4_competence == 1) checked @endif>
                                            <label class="form-check-label" for="ol4_competence">4</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol5_performance"
                                                name="ol5_performance" value="1" @if ($project->ol5_performance == 1) checked @endif>
                                            <label class="form-check-label" for="ol5_performance">5</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol6_patient_outcomes"
                                                name="ol6_patient_outcomes" value="1" @if ($project->ol6_patient_outcomes == 1) checked @endif>
                                            <label class="form-check-label" for="ol6_patient_outcomes">6</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="ol7_community_health"
                                                name="ol7_community_health" value="1" @if ($project->ol7_community_health == 1) checked @endif>
                                            <label class="form-check-label" for="ol7_community_health">7</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Accreditation Type For IPCE --}}

                        @php
                            $accreditation_type_4_ipce = '';
                            if (!empty($project->accreditation_type_4_ipce)) {
                                $accreditation_type_4_ipce = $project->accreditation_type_4_ipce;
                            }
                        @endphp

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="accreditation_type_4_ipce">Accreditation</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="accreditation_type_4_ipce"
                                                name="accreditation_type_4_ipce" value="IPCE" @if ($accreditation_type_4_ipce === 'IPCE') checked @endif>
                                            <label class="form-check-label" for="accreditation_type_4_ipce">IPCE</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio"
                                                id="accreditation_type_4_non_ipce" name="accreditation_type_4_ipce"
                                                value="Non-IPCE" @if ($accreditation_type_4_ipce === 'Non-IPCE') checked @endif>
                                            <label class="form-check-label"
                                                for="accreditation_type_4_non_ipce">Non-IPCE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="description" class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control" id="description" cols="30"
                                    rows="4">{{ $project->description }}</textarea>
                                <div class="error_description error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="ta_keywords" class="col-md-3 col-form-label">TA keywords</label>
                            <div class="col-md-9">
                                <textarea name="ta_keywords" id="ta_keywords" class="form-control" cols="30"
                                    rows="4">{{ $project->ta_keywords }}</textarea>
                                <div class="error_ta_keywords error_message"></div>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label for="professionalPractice" class="col-md-3 col-form-label">State the <b>professional
                                    practice gap(s)</b> of your learners on which the activity was based (maximum 100
                                words). [JAC4]</label>
                            <div class="col-md-9">
                                <textarea name="practice_gap" class="form-control" id="practice_gap" cols="30"
                                    rows="4">{{ $project->meta->practice_gaps }}</textarea>
                                <div class="error_practice_gap error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="professionalPractice" class="col-md-3 col-form-label">State the educational
                                need(s)
                                that you determined to be the cause of the professional practice gap(s) (maximum 50
                                words
                                each). [JAC4]</label>
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" name="enable_needs[]"
                                        id="enable_knowledge_need" value="Knowledge need" @if (!empty($project->meta->knowledge_need)) checked @endif>
                                    <label class="form-check-label" for="knowledge_need">Knowledge need
                                        <small>and/or</small></label>
                                </div>
                                {{-- <label for="knowledge_need">Knowledge need <small>and/or</small></label> --}}
                                <textarea name="knowledge_need" class="form-control" id="knowledge_need" cols="30"
                                    rows="2" @if (empty($project->meta->knowledge_need)) disabled @endif>{{ $project->meta->knowledge_need }}</textarea>
                                <div class="error_knowledge_need error_message"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" name="enable_needs[]"
                                        id="enable_skills_need" value="Skills/Strategy need" @if (!empty($project->meta->skills_need)) checked @endif>
                                    <label class="form-check-label" for="skills_need">Skills/Strategy need
                                        <small>and/or</small></label>
                                </div>
                                {{-- <label for="skills_need">Skills/Strategy need <small>and/or</small></label> --}}
                                <textarea name="skills_need" class="form-control" id="skills_need" cols="30" rows="2"
                                    @if (empty($project->meta->skills_need)) disabled @endif>{{ $project->meta->skills_need }}</textarea>
                                <div class="error_skills_need error_message"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" name="enable_needs[]"
                                        id="enable_performance_need" value="Performance need" @if (!empty($project->meta->performance_need)) checked @endif>
                                    <label class="form-check-label" for="performance_need">Performance need
                                        <small>and/or</small></small></label>
                                </div>
                                {{-- <label for="performance_need">Performance need <small>and/or</small></label> --}}
                                <textarea name="performance_need" class="form-control" id="performance_need" cols="30"
                                    rows="2" @if (empty($project->meta->performance_need)) disabled @endif>{{ $project->meta->performance_need }}</textarea>
                                <div class="error_performance_need error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="activity_designed" class="col-md-3 col-form-label">State what this CE activity
                                was
                                designed to change in terms of learner's skill/strategy or performance of the healthcare
                                team or patient outcomes. (maximum 50 words). [JAC5]</label>
                            <div class="col-md-9">
                                <textarea name="activity_designed" class="form-control" id="activity_designed" cols="30"
                                    rows="5">{{ $project->meta->activity_designed }}</textarea>
                                <div class="error_activity_designed error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="learning_objectives" class="col-md-3 col-form-label">Learning objectives /
                                outcomes</label>
                            <div class="col-md-9">
                                <textarea name="learning_objectives" class="form-control" id="learning_objectives"
                                    cols="30" rows="5">{{ $project->meta->learning_objectives }}</textarea>
                                <div class="error_learning_objectives error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="ensure_activity" class="col-md-3 col-form-label">Explain how you ensured the
                                activity was generated around valid content. (maximum 50 words). [JAC6]</label>
                            <div class="col-md-9">
                                <textarea name="ensure_activity" class="form-control" id="ensure_activity" cols="30"
                                    rows="5">{{ $project->meta->ensure_activity }}</textarea>
                                <div class="error_ensure_activity error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="educational_format" class="col-md-3 col-form-label">Explain how the activity
                                promotes active learning for the healthcare team that is consistent with the activity’s
                                desired results (maximum 50 words) [JAC7]</label>
                            <div class="col-md-9">
                                <textarea name="educational_format" class="form-control" id="educational_format"
                                    cols="30" rows="4">{{ $project->meta->educational_format }}</textarea>
                                <div class="error_educational_format error_message"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="planned_strategies" class="col-md-3 col-form-label">Describe one or two
                                ancillary support tools or strategies you envision making available to learners in this
                                activity for the purpose of sustaining changes advocated in this activity: [e.g.,
                                algorithms, patient handouts, checklists, guides, etc [JAC9]</label>
                            <div class="col-md-9">
                                <textarea name="planned_strategies" class="form-control" id="planned_strategies"
                                    cols="30" rows="4">{{ $project->meta->planned_strategies }}</textarea>
                                <div class="error_planned_strategies error_message"></div>
                            </div>
                        </div>

                        @php
                            $barriers_strategies = json_decode($project->meta->barriers_strategies);
                        @endphp

                        <div class="form-group row mb-4">
                            <label for="barriers_strategies" class="col-md-3 col-form-label">Identify barriers to change
                                for the healthcare team members associated with this activity and strategies you plan to
                                implement to remove, overcome or address those barriers to change [JAC10]</label>
                            <div class="col-md-9">
                                <div class="row barriers_strategies">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies_1"
                                                name="barriers_strategies[]"
                                                value="Engage patients and caregivers in shared decision making" @if (!empty($barriers_strategies) && in_array('Engage patients and caregivers in shared decision making', $barriers_strategies)) checked @endif>
                                            <label class="form-check-label" for="barriers_strategies_1">Engage patients
                                                and
                                                caregivers in shared decision making</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies_2"
                                                name="barriers_strategies[]"
                                                value="Coordinating care with interprofessional team" @if (!empty($barriers_strategies) && in_array('Coordinating care with interprofessional team', $barriers_strategies)) checked @endif>
                                            <label class="form-check-label" for="barriers_strategies_2">Coordinating
                                                care with
                                                interprofessional team</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies_3"
                                                name="barriers_strategies[]" value="Patient adherence" @if (!empty($barriers_strategies) && in_array('Patient adherence', $barriers_strategies)) checked @endif>
                                            <label class="form-check-label" for="barriers_strategies_3">Patient
                                                adherence</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies_4"
                                                name="barriers_strategies[]"
                                                value="Decision making in the presence of conflicting evidence" @if (!empty($barriers_strategies) && in_array('Decision making in the presence of conflicting evidence', $barriers_strategies)) checked @endif>
                                            <label class="form-check-label" for="barriers_strategies_4">Decision making
                                                in the
                                                presence of conflicting evidence</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies_5"
                                                name="barriers_strategies[]"
                                                value="Lack of training/experience with this specific topic" @if (!empty($barriers_strategies) && in_array('Lack of training/experience with this specific topic', $barriers_strategies)) checked @endif>
                                            <label class="form-check-label" for="barriers_strategies_5">Lack of
                                                training/experience with this specific topic</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="barriers_strategies_6"
                                                name="barriers_strategies[]"
                                                value="Cost/Reimbursement/Therapy Approval Status" @if (!empty($barriers_strategies) && in_array('Cost/Reimbursement/Therapy Approval Status', $barriers_strategies)) checked @endif>
                                            <label class="form-check-label"
                                                for="barriers_strategies_6">Cost/Reimbursement/Therapy Approval
                                                Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row barriers_strategies_other">
                            <label for="barriers_strategies_other" class="col-md-3 col-form-label">Other</label>
                            <div class="col-md-9">
                                <input type="text" name="barriers_strategies_other"
                                    value="{{ $project->meta->barriers_strategies_other }}" class="form-control"
                                    id="barriers_strategies_other" />
                                <div class="error_barriers_strategies_other error_message"></div>
                            </div>
                        </div>

                        <div class="form-group mb-2 text-center">
                            <p>Indicate the desirable attribute(s) of the healthcare team (i.e., competencies) this
                                activity
                                addresses. [JAC8]</p>

                            <label for="TargetAudience" class="size16"><strong>Core Competencies for</strong></label>

                        </div>

                        @php
                            $medicine_institutes = json_decode($project->meta->medicine_institutes);
                            $collaborative_practices = json_decode($project->meta->collaborative_practices);
                            $acgme_abms_competencies = json_decode($project->meta->acgme_abms_competencies);
                        @endphp
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="medicine_institutes"><strong>Institute of Medicine
                                        Competencies</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Provide-patient"
                                        name="medicine_institutes[]" value="Provide patient-centered care" @if (!empty($medicine_institutes) && in_array('Provide patient-centered care', $medicine_institutes)) checked @endif>
                                    <label class="form-check-label" for="Provide-patient">Provide patient-centered
                                        care</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Work-interdisciplinary"
                                        name="medicine_institutes[]" value="Work in interdisciplinary teams" @if (!empty($medicine_institutes) && in_array('Work in interdisciplinary teams', $medicine_institutes)) checked @endif>
                                    <label class="form-check-label" for="Work-interdisciplinary">Work in
                                        interdisciplinary
                                        teams</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Employ-evidence"
                                        name="medicine_institutes[]" value="Employ evidence-based practice" @if (!empty($medicine_institutes) && in_array('Employ evidence-based practice', $medicine_institutes)) checked @endif>
                                    <label class="form-check-label" for="Employ-evidence">Employ evidence-based
                                        practice</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Apply-quality"
                                        name="medicine_institutes[]" value="Apply quality improvement" @if (!empty($medicine_institutes) && in_array('Apply quality improvement', $medicine_institutes)) checked @endif>
                                    <label class="form-check-label" for="Apply-quality">Apply quality
                                        improvement</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input class="form-check-input" type="checkbox" id="Utilize-informatics"
                                        name="medicine_institutes[]" value="Utilize informatics" @if (!empty($medicine_institutes) && in_array('Utilize informatics', $medicine_institutes)) checked @endif>
                                    <label class="form-check-label" for="Utilize-informatics">Utilize
                                        informatics</label>
                                </div>

                            </div>


                            <div class="col-md-4">

                                <label for="collaborative_practices"><strong>Interprofessional Collaborative
                                        Practice</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" @if (!empty($collaborative_practices) && in_array('Values/Ethics for Interprofessional Practice', $collaborative_practices)) checked @endif class="form-check-input" type="checkbox"
                                        id="Interprofessional-Practice"
                                        value="Values/Ethics for Interprofessional Practice">
                                    <label class="form-check-label" for="Interprofessional-Practice">Values/Ethics for
                                        Interprofessional Practice</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" @if (!empty($collaborative_practices) && in_array('Roles/Responsibilities', $collaborative_practices)) checked @endif class="form-check-input" type="checkbox"
                                        id="Roles-Responsibilities" value="Roles/Responsibilities">
                                    <label class="form-check-label"
                                        for="Roles-Responsibilities">Roles/Responsibilities</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" @if (!empty($collaborative_practices) && in_array('Interprofessional Communucation', $collaborative_practices)) checked @endif class="form-check-input" type="checkbox"
                                        id="InterorofessionalCommunucation" value="Interprofessional Communucation">
                                    <label class="form-check-label"
                                        for="InterorofessionalCommunucation">Interprofessional Communucation</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="collaborative_practices[]" @if (!empty($collaborative_practices) && in_array('Teams and Teamwork', $collaborative_practices)) checked @endif value="Teams and Teamwork"
                                        class="form-check-input" type="checkbox" id="TeamsTeamwork">
                                    <label class="form-check-label" for="TeamsTeamwork">Teams and Teamwork</label>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <label for="acgme_abms_competencies"><strong>ACGME/ABMS Competencies</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" @if (!empty($acgme_abms_competencies) && in_array('Patient Care and Procedural Skills', $acgme_abms_competencies)) checked @endif class="form-check-input" type="checkbox"
                                        id="PatientCare" value="Patient Care and Procedural Skills">
                                    <label class="form-check-label" for="PatientCare">Patient Care and Procedural
                                        Skills</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" @if (!empty($acgme_abms_competencies) && in_array('Medical Knowledge', $acgme_abms_competencies)) checked @endif class="form-check-input" type="checkbox"
                                        id="Medical-Knowledge" value="Medical Knowledge">
                                    <label class="form-check-label" for="Medical-Knowledge">Medical Knowledge</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" @if (!empty($acgme_abms_competencies) && in_array('Practice-based Learning and Improvement', $acgme_abms_competencies)) checked @endif class="form-check-input" type="checkbox"
                                        id="Practice-based" value="Practice-based Learning and Improvement">
                                    <label class="form-check-label" for="Practice-based">Practice-based Learning and
                                        Improvement</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" @if (!empty($acgme_abms_competencies) && in_array('Interpersonal and Communication Skills', $acgme_abms_competencies)) checked @endif class="form-check-input" type="checkbox"
                                        id="Communication-Skills" value="Interpersonal and Communication Skills">
                                    <label class="form-check-label" for="Communication-Skills">Interpersonal and
                                        Communication Skills</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" @if (!empty($acgme_abms_competencies) && in_array('Professionalism', $acgme_abms_competencies)) checked @endif class="form-check-input" type="checkbox"
                                        id="Professionalism" value="Professionalism">
                                    <label class="form-check-label" for="Professionalism">Professionalism</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="acgme_abms_competencies[]" @if (!empty($acgme_abms_competencies) && in_array('System-based Practice', $acgme_abms_competencies)) checked @endif class="form-check-input" type="checkbox"
                                        id="System-based" value="System-based Practice">
                                    <label class="form-check-label" for="System-based">System-based Practice</label>
                                </div>

                            </div>

                        </div>

                        @php
                            $national_quality_strategy = json_decode($project->meta->national_quality_strategy);
                        @endphp
                        <div class="form-group row">

                            <div class="col-md-4">

                                <label for="national_quality_strategy"><strong>National Quality
                                        Strategy</strong></label>

                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" @if (!empty($national_quality_strategy) && in_array('Making Care Safer', $national_quality_strategy)) checked @endif class="form-check-input" type="checkbox"
                                        value="Making Care Safer" id="MakingCareSafer">
                                    <label class="form-check-label" for="MakingCareSafer">Making Care Safer</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" @if (!empty($national_quality_strategy) && in_array('Patient and Family Engagement', $national_quality_strategy)) checked @endif class="form-check-input" type="checkbox"
                                        value="Patient and Family Engagement" id="Engagement">
                                    <label class="form-check-label" for="Engagement">Patient and Family
                                        Engagement</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" @if (!empty($national_quality_strategy) && in_array('Communication and Care Coordination', $national_quality_strategy)) checked @endif class="form-check-input" type="checkbox"
                                        value="Communication and Care Coordination" id="Coordination">
                                    <label class="form-check-label" for="Coordination">Communication and Care
                                        Coordination</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" @if (!empty($national_quality_strategy) && in_array('Prevention and Treatment Strategies', $national_quality_strategy)) checked @endif class="form-check-input" type="checkbox"
                                        value="Prevention and Treatment Strategies" id="Prevention">
                                    <label class="form-check-label" for="Prevention">Prevention and Treatment
                                        Strategies</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" @if (!empty($national_quality_strategy) && in_array('Healthy Living', $national_quality_strategy)) checked @endif class="form-check-input" type="checkbox"
                                        value="Healthy Living" id="Living">
                                    <label class="form-check-label" for="Living">Healthy Living</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="national_quality_strategy[]" @if (!empty($national_quality_strategy) && in_array('Care Affordability', $national_quality_strategy)) checked @endif class="form-check-input" type="checkbox"
                                        value="Care Affordability" id="Affordability">
                                    <label class="form-check-label" for="Affordability">Care Affordability</label>
                                </div>
                            </div>
                        </div>

                        @php
                            $cape_competencies = json_decode($project->meta->cape_competencies);
                        @endphp

                        <label for="cape_competencies"><strong>CAPE Competencies</strong></label>
                        <div class="form-group row mb-4">
                            <div class="col-md-3">
                                <label for="knowledge"><strong>Foundational Knowledge</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="knowledge[]" @if (!empty($cape_competencies->knowledge) && in_array('Foundational Knowledge', $cape_competencies->knowledge)) checked @endif class="form-check-input" type="checkbox"
                                        id="FoundationalKnowledge" value="Foundational Knowledge">
                                    <label class="form-check-label" for="FoundationalKnowledge">Learner</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="practice_and_care_essentials"><strong>Essentials for Practice and Care</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" @if (!empty($cape_competencies->practice_and_care_essentials) && in_array('Patient-centered care', $cape_competencies->practice_and_care_essentials)) checked @endif class="form-check-input" type="checkbox"
                                        id="patient-centered-care" value="Patient-centered care">
                                    <label class="form-check-label" for="patient-centered-care">Patient-centered
                                        care</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" @if (!empty($cape_competencies->practice_and_care_essentials) && in_array('Medication use systems management', $cape_competencies->practice_and_care_essentials)) checked @endif class="form-check-input" type="checkbox"
                                        id="medication-use-systems-management"
                                        value="Medication use systems management">
                                    <label class="form-check-label" for="medication-use-systems-management">Medication
                                        use systems management</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" @if (!empty($cape_competencies->practice_and_care_essentials) && in_array('Health and wellness', $cape_competencies->practice_and_care_essentials)) checked @endif class="form-check-input" type="checkbox"
                                        id="health-and-wellness" value="Health and wellness">
                                    <label class="form-check-label" for="health-and-wellness">Health and
                                        wellness</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_essentials[]" @if (!empty($cape_competencies->practice_and_care_essentials) && in_array('Population-based care', $cape_competencies->practice_and_care_essentials)) checked @endif class="form-check-input" type="checkbox"
                                        id="population-based-care" value="Population-based care">
                                    <label class="form-check-label" for="population-based-care">Population-based
                                        care</label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="practice_and_care_approaches"><strong>Approach to Practice and Care
                                        </strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" @if (!empty($cape_competencies->practice_and_care_approaches) && in_array('Problem-solving', $cape_competencies->practice_and_care_approaches)) checked @endif class="form-check-input" type="checkbox"
                                        id="problem-solving" value="Problem-solving">
                                    <label class="form-check-label" for="problem-solving">Problem-solving</label>
                                </div>

                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" @if (!empty($cape_competencies->practice_and_care_approaches) && in_array('Educator', $cape_competencies->practice_and_care_approaches)) checked @endif class="form-check-input" type="checkbox"
                                        id="educator" value="Educator">
                                    <label class="form-check-label" for="educator">Educator</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" @if (!empty($cape_competencies->practice_and_care_approaches) && in_array('Patient Advocacy', $cape_competencies->practice_and_care_approaches)) checked @endif class="form-check-input" type="checkbox"
                                        id="patient-advocacy" value="Patient Advocacy">
                                    <label class="form-check-label" for="patient-advocacy">Patient Advocacy</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" @if (!empty($cape_competencies->practice_and_care_approaches) && in_array('Interprofessional collaboration', $cape_competencies->practice_and_care_approaches)) checked @endif class="form-check-input" type="checkbox"
                                        id="interprofessional-collaboration" value="Interprofessional collaboration">
                                    <label class="form-check-label"
                                        for="interprofessional-collaboration">Interprofessional
                                        collaboration</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" @if (!empty($cape_competencies->practice_and_care_approaches) && in_array('Cultural Sensitivity', $cape_competencies->practice_and_care_approaches)) checked @endif class="form-check-input" type="checkbox"
                                        id="cultural-sensitivity" value="Cultural Sensitivity">
                                    <label class="form-check-label" for="cultural-sensitivity">Cultural
                                        Sensitivity</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="practice_and_care_approaches[]" @if (!empty($cape_competencies->practice_and_care_approaches) && in_array('Communication', $cape_competencies->practice_and_care_approaches)) checked @endif class="form-check-input" type="checkbox"
                                        id="communication" value="Communication">
                                    <label class="form-check-label" for="communication">Communication</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="personal_and_profesional_development"><strong>Personal and Profesional
                                        Development</strong></label>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" @if (!empty($cape_competencies->personal_and_profesional_development) && in_array('Self-awareness', $cape_competencies->personal_and_profesional_development)) checked @endif class="form-check-input" type="checkbox"
                                        id="self-awareness" value="Self-awareness">
                                    <label class="form-check-label" for="self-awareness">Self-awareness</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" @if (!empty($cape_competencies->personal_and_profesional_development) && in_array('Leadership', $cape_competencies->personal_and_profesional_development)) checked @endif class="form-check-input" type="checkbox"
                                        id="leadership" value="Leadership">
                                    <label class="form-check-label" for="leadership">Leadership</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" @if (!empty($cape_competencies->personal_and_profesional_development) && in_array('Innovataion and Entrepreneurship', $cape_competencies->personal_and_profesional_development)) checked @endif class="form-check-input" type="checkbox"
                                        id="ionnovataion_and_entrepreneurship" value="Innovataion and Entrepreneurship">
                                    <label class="form-check-label" for="ionnovataion_and_entrepreneurship">Innovataion
                                        and
                                        Entrepreneurship</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input name="personal_and_profesional_development[]" @if (!empty($cape_competencies->personal_and_profesional_development) && in_array('Professionalism', $cape_competencies->personal_and_profesional_development)) checked @endif class="form-check-input" type="checkbox"
                                        id="pp_professionalism" value="Professionalism">
                                    <label class="form-check-label" for="pp_professionalism">Professionalism</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="other_competencies" class="col-md-3 col-form-label">Other
                                Competency(ies)(specify)</label>
                            <div class="col-md-9">
                                <input type="text" name="other_competencies" class="form-control"
                                    id="other_competencies" value="{{ $project->meta->other_competencies }}">
                            </div>
                        </div>

                        <div>
                            <div class="error_target_audience error_message"></div>
                            <div class="error_accreditation_types error_message"></div>
                            <div class="error_moc_boards error_message"></div>
                            <div class="error_moc_credit_types error_message"></div>
                            <div class="error_moc_practices error_message"></div>
                            <div class="error_accreditation_type_4_ipce error_message"></div>
                        </div>                       
            </div>
        </div>
    </div>
     <button class='btn btn-lg btn-primary mt-15 mb-12 ml-10' type="submit"> Update</button>
     </fieldset>
    </form>
</div>
