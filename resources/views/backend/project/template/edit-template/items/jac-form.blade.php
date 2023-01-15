<div class="panel-body">
    <form id="eForm" action="{{ route('project.jac.store', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="ibox-title">
        <h5>Joint Accreditation Commendation Criteria</h5>
        <span class="pull-right"><button class='btn btn-md btn-primary' type="submit">Update</button></span>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">      
                
                 <div class="alert alert-info">
                    <h4>Title: {{ Str::words($project->activity_title, 18, '...') }}</h4>
                    <h4>Activity ID: {{ $project->activity_id }}</h4>
                </div>

                
                    <fieldset class="AttachmentsWrap">
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac13">JAC 13</label></div>
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
                                            <input class="form-check-input EditJAC13" type="radio" id="jac13_1"
                                                name="jac13" value="1" @if ($project->jac13 == 1) checked @endif>
                                            <label class="form-check-label" for="jac13_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input EditJAC13" type="radio" name="jac13"
                                                id="jac13_2" value="0" @if ($project->jac13 == 0) checked @endif>
                                            <label class="form-check-label" for="jac13_2">No</label>
                                        </div>
                                    </div>

                                    <div id="JAC13_extra" @if ($project->jac13 == 0) class="d-none" @endif>
                                        <div class="col-md-12 mt-6 no-padding">
                                            <div class="col-md-4">
                                                <label for="jac13_patient_planner" class="form-group">Name of Patient
                                                    Planner:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="jac13_patient_planner"
                                                    value="{{ $project->meta->jac13_patient_planner }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="col-md-4">
                                                <label for="jac13_patient_presenter" class="form-group">Name of Patient
                                                    Presenter:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="jac13_patient_presenter"
                                                    value="{{ $project->meta->jac13_patient_presenter }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <label for="jac13_mechanism" class="form-group">Indicate the mechanism used
                                                to include patient as presenter :</label>

                                            <textarea name="jac13_mechanism" id="jac13_mechanism" class="form-control"
                                                cols="30" rows="4">{{ $project->meta->jac13_mechanism }}</textarea>

                                        </div>
                                    </div>


                                </div>
                                <label for="jac13_description" class="col-form-label" style="margin-top:25px;">
                                    Describe in what way the planners and presenters of the activity represent the
                                    patient
                                    or public, along with
                                    the role they played in the planning AND delivery of your CE activity. (maximum 250
                                    words per example)
                                </label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac13_description" id="jac13_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac13_description }}</textarea>
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
                                    and
                                    teachers in
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
                                            <input class="form-check-input EditJAC14" type="radio" id="jac14_1"
                                                name="jac14" value="1" @if ($project->jac14 == 1) checked @endif>
                                            <label class="form-check-label" for="jac14_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input EditJAC14" type="radio" name="jac14"
                                                id="jac14_2" value="0" @if ($project->jac14 == 0) checked @endif>
                                            <label class="form-check-label" for="jac14_2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="JAC14_extra" @if ($project->jac14 == 0) class="d-none" @endif>
                                    <div class="col-md-12 mt-6 no-padding">
                                        <div class="col-md-4">
                                            <label for="jac14_patient_planner" class="form-group">Name of Fellow/Student Planner:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="jac14_patient_planner"
                                                value="{{ $project->meta->jac14_patient_planner }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12 no-padding">
                                        <div class="col-md-4">
                                            <label for="jac14_patient_presenter" class="form-group">Name of Fellow/Student  Presenter:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="jac14_patient_presenter"
                                                value="{{ $project->meta->jac14_patient_presenter }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label for="jac14_mechanism" class="form-group">Indicate the mechanism used to
                                            include Fellow/Student as presenter:</label>

                                        <textarea name="jac14_mechanism" id="jac14_mechanism" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac14_mechanism }}</textarea>

                                    </div>
                                </div>


                                <label for="jac14_description" class="col-form-label" style="margin-top:25px;">Describe the health professions’
                                    students involved in the activity, including their profession and level of study (e.g. undergraduate medical
                                    students, nurse practitioner students, residents in general surgery) and how they participated as
                                    both planners and faculty of the activity. (maximum 250 words per example activity)
                                </label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac14_description" id="jac14_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac14_description }}</textarea>
                                        <div class="error_jac14_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac16">JAC 16</label></div>
                            <div class="col-md-9">
                                <label for="jac16">The provider engages in research and scholarship related to accredited IPCE and/or CE and disseminates findings through presentation or publication. 
                                </label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Conducts scholarly pursuit relevant to IPCE and/or CE; AND</li>
                                                <li>Submits, presents, or publishes a poster, abstract, or manuscript to or in a peer-reviewed forum.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac16_1" name="jac16"
                                                value="1" @if ($project->jac16 == 1) checked @endif>
                                            <label class="form-check-label" for="jac16_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac16" id="jac16_2"
                                                value="0" @if ($project->jac16 == 0) checked @endif>
                                            <label class="form-check-label" for="jac16_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac16_description" class="col-form-label">If yes, describe the project, how it was developed and strategies used to disseminate the findings, i.e., publication or presentation (maximum 250 words).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac16_description" id="jac16_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac16_description }}</textarea>
                                        <div class="error_jac16_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac17">JAC 17</label></div>
                            <div class="col-md-9">
                                <label for="jac17">The provider advances the use of health and practice data for health care improvement.
                                </label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Teaches about collection, analysis, or synthesis of health/practice data AND</li>
                                                <li>Uses health/practice data to teach about healthcare improvement</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac17_1" name="jac17"
                                                value="1" @if ($project->jac17 == 1) checked @endif>
                                            <label class="form-check-label" for="jac17_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac17" id="jac17_2"
                                                value="0" @if ($project->jac17 == 0) checked @endif>
                                            <label class="form-check-label" for="jac17_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac17_description" class="col-form-label">Describe how the activity taught learners about
                                    collection, analysis, or synthesis of health/practice data and how the activity used health/practice data to
                                    teach about healthcare improvement. (maximum 250 words per activity description)</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac17_description" id="jac17_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac17_description }}</textarea>
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
                                    (e.g.
                                    social determinants) that affect the health of the patients and integrates those
                                    factors
                                    into accredited IPCE and/or CE.</label>
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
                                            <input class="form-check-input" type="radio" id="jac18_1" name="jac18"
                                                value="1" @if ($project->jac18 == 1) checked @endif>
                                            <label class="form-check-label" for="jac18_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac18" id="jac18_2"
                                                value="0" @if ($project->jac18 == 0) checked @endif>
                                            <label class="form-check-label" for="jac18_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac18_description" class="col-form-label">Describe the strategy or strategies used to achieve
                                    improvements in population health (maximum 250 words per example)</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac18_description" id="jac18_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac18_description }}</textarea>
                                        <div class="error_jac18_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac19">JAC 19</label></div>
                            <div class="col-md-9">
                                <label for="jac19">The provider collaborates with other organizations to more effectively address population health issues.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Creates or continues collaborations with one or more healthcare or community organization(s)
                                                    AND</li>
                                                <li>Demonstrates that the collaborations augment the provider’s ability to address population
                                                    health issues</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac19_1" name="jac19"
                                                value="1" @if ($project->jac19 == 1) checked @endif>
                                            <label class="form-check-label" for="jac19_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac19" id="jac19_2"
                                                value="0" @if ($project->jac19 == 0) checked @endif>
                                            <label class="form-check-label" for="jac19_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac19_description" class="col-form-label">Describe the nature of the collaboration (new/continued) with one or more healthcare or community organization(s) AND demonstrate that the
                                    collaboration augmented MLI’s ability to address population health issues.</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac19_description" id="jac19_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac19_description }}</textarea>
                                        <div class="error_jac19_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac20">JAC 20</label></div>
                            <div class="col-md-9">
                                <label for="jac20">The provider designs accredited interprofessional continuing education (IPCE) and/or CE (that includes direct observation and formative feedback) to optimize communication skills of learners.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Provides IPCE/CE to improve communication skills; AND</li>
                                                <li>Includes an evaluation of observed (e.g., in person or video) communication skills; AND</li>
                                                <li>Provides formative feedback to the learner about communication skills.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac20_1" name="jac20"
                                                value="1" @if ($project->jac20 == 1) checked @endif>
                                            <label class="form-check-label" for="jac20_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac20" id="jac20_2"
                                                value="0" @if ($project->jac20 == 0) checked @endif>
                                            <label class="form-check-label" for="jac20_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac20_description" class="col-form-label">If yes, describe the activity and mechanism used to provide feedback on learner communication skills (maximum 250 words).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac20_description" id="jac20_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac20_description }}</textarea>
                                        <div class="error_jac20_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac21">JAC 21</label></div>
                            <div class="col-md-9">
                                <label for="jac21">The provider designs accredited IPCE and/or CE (that includes direct observation and formative feedback) to optimize technical and procedural skills of learners.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Provides IPCE/CE addressing psychomotor technical and/or procedural skills; AND</li>
                                                <li>Includes an evaluation of observed (e.g., in person or video) technical or procedural skill; AND</li>
                                                <li>Provides formative feedback to the learner about technical and/or procedural skills</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac21_1" name="jac21"
                                                value="1" @if ($project->jac21 == 1) checked @endif>
                                            <label class="form-check-label" for="jac21_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac21" id="jac21_2"
                                                value="0" @if ($project->jac21 == 0) checked @endif>
                                            <label class="form-check-label" for="jac21_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac21_description" class="col-form-label">If yes, describe how this activity will help learners gain, retain, or improve technical and/or procedural skills, such as operative skill, device use, procedures, physical examination, specimen preparation, resuscitation, and critical incident management (maximum 250 words).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac21_description" id="jac21_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac21_description }}</textarea>
                                        <div class="error_jac21_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac22">JAC 22</label></div>
                            <div class="col-md-9">
                                <label for="jac22">TThe provider creates and facilitates the implementation of individualized learning plans. </label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Tracks the repeated engagement of the learner/team with a longitudinal curriculum/plan over weeks or months, AND</li>
                                                <li>Provides individualized feedback to the learner/team to close practice gaps.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac22_1" name="jac22"
                                                value="1" @if ($project->jac22 == 1) checked @endif>
                                            <label class="form-check-label" for="jac22_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac22" id="jac22_2"
                                                value="0" @if ($project->jac22 == 0) checked @endif>
                                            <label class="form-check-label" for="jac22_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac22_description" class="col-form-label">If yes, describe the strategy or strategies that will be used to design an individualized educational plan for the learner and/or healthcare team to close the individual/or team’s professional practice gap over time; either through a customized curriculum, self-directed learning plan where the learner/team assesses their own gaps and selects content to address those gaps (maximum 250 words).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac22_description" id="jac22_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac22_description }}</textarea>
                                        <div class="error_jac22_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-3 mt-3">
                            <div class="col-md-3"><label for="jac23">JAC 23</label></div>
                            <div class="col-md-9">
                                <label for="jac24">The provider demonstrates improvement in the performance of the healthcare team as a result of its overall IPCE program.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Collaborates in the process of healthcare quality improvement AND </li>
                                                <li>Demonstrates improvement in healthcare quality</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac23_1" name="jac23"
                                                value="1" @if ($project->jac23 == 1) checked @endif>
                                            <label class="form-check-label" for="jac23_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac23_2" id="jac23"
                                                value="0" @if ($project->jac23 == 0) checked @endif>
                                            <label class="form-check-label" for="jac23_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac23_description" class="col-form-label">Describe how MLI collaborated in
                                    the
                                    process of healthcare
                                    quality improvement, along with the improvements that resulted. Include data
                                    (qualitative or quantitative)
                                    that demonstrates those improvements (maximum 500 words per collaboration).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac23_description" id="jac23_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac23_description }}</textarea>
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
                                    through
                                    the involvement of
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
                                            <input class="form-check-input" type="radio" id="jac24_1" name="jac24"
                                                value="1" @if ($project->jac24 == 1) checked @endif>
                                            <label class="form-check-label" for="jac24_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac24" id="jac24_2"
                                                value="0" @if ($project->jac24 == 0) checked @endif>
                                            <label class="form-check-label" for="jac24_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac24_description" class="col-form-label">Describe how MLI collaborated in
                                    the
                                    process of healthcare
                                    quality improvement, along with the improvements that resulted. Include data
                                    (qualitative or quantitative)
                                    that demonstrates those improvements (maximum 500 words per collaboration).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac24_description" id="jac24_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac24_description }}</textarea>
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
                                    program
                                    on patients or
                                    their communities.</label>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-10">
                                        <label class="form-group">Requirements:</label>
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Collaborates in the process of improving patient or community health
                                                    AND
                                                </li>
                                                <li>Demonstrates improvement in patient or community outcomes</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" id="jac25_1" name="jac25"
                                                value="1" @if ($project->jac25 == 1) checked @endif>
                                            <label class="form-check-label" for="jac25_1">Yes</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input class="form-check-input" type="radio" name="jac25" id="jac25_2"
                                                value="0" @if ($project->jac25 == 0) checked @endif>
                                            <label class="form-check-label" for="jac25_2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="jac25_description" class="col-form-label">Describe how MLI collaboration in
                                    the
                                    process of improving
                                    patient or community health that included CE, along with the improvements that
                                    resulted.
                                    Include data
                                    (qualitative or quantitative) that demonstrates those improvements (maximum 500
                                    words
                                    per
                                    collaboration).</label>
                                <div class="form-group row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <textarea name="jac25_description" id="jac25_description" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac25_description }}</textarea>
                                        <div class="error_jac25_description error_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>

    </fieldset>
    <button class='btn btn-lg btn-primary' type="submit">Update</button>
    </form>
</div>
