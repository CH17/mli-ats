<div class="panel-body">

    <form id="eForm" action="{{ route('project.disclosures.store', ['project' => $project->id]) }}"  method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <fieldset>

    <div class="ibox-title">
        <h5>Disclosures</h5>
        <span class="pull-right"> <button class='btn btn-md btn-primary' type="submit">Update</button></span>
        <div class="clear"></div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="alert alert-info">
                    <h4>Title: {{ Str::words($project->activity_title, 18, '...') }}</h4>
                    <h4>Activity ID: {{ $project->activity_id }}</h4>
                </div>

                <div class="form-group mb-4">
                    <h5>For faculty participating in this activity</h5>
                    <hr>
                    <p>Complete the table below. For each individual, list the name of the individual, the
                        individual's role (e.g., planner, chair, co-chair, presenter, etc.) in the activity, the
                        name of the ACCME-defined ineligible company with which the individual has a relevant
                        financial relationship (or if the individual has no relevant financial relationships),
                        and the nature of that relationship. [JAC 12, SCS 2.1, 2.2,2.3]. ALL individuals should
                        be listed in the DDF.</p>

                    <p> (Note: please ensure that when you are collectiong this information from individuals,
                        that you are using the most current definitions of what constitutes a relevant financial
                        relationship and ACCME-defined ineligible company).</p>
                </div>

                <div class="form-group mb-4">
                    <div class="tableContentWrap">
                        <table id="individualsActivity" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name of individual</th>
                                    <th>Individual's role in activity</th>
                                    <th>Name of Ineligible Company</th>
                                    <th>Nature of relationship</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Example: Jane Smythe, MD</td>
                                    <td>Course Director</td>
                                    <td>None</td>
                                    <td>---</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Example: Thomas Jones</td>
                                    <td>Faculty</td>
                                    <td>Pharma Co. US</td>
                                    <td>Research grant</td>
                                    <td></td>
                                </tr>

                                @php
                                $controll_individuals = json_decode($project->meta->controll_individuals);
                                @endphp
                                @if (!empty($controll_individuals))
                                @php
                                $counter = 1;
                                $role_in_activity_arr = ['Chair/Planner/Presenter', 'Co-Chair/Planner/Presenter', 'Chair/Planner', 'Co-Chair/Planner', 'Planner/Presenter', 'Planner/Presenter (Fellow)', 'Planner/Presenter (Student)', 'Planner/Presenter (Patient Caregiver)',
                                'Presenter', 'Nurse Planner', 'Pharmacist Planner', 'Planner', 'Content/Peer Reviewer'];
                                @endphp
                                @foreach ($controll_individuals as $key => $controll_individual)
                                <tr class="control_individuals">
                                    <td><input class="form-control expandable" type="text"
                                            name="controll_individuals[{{ $counter }}][name_of_individual]"
                                            value="{{ $controll_individual->name_of_individual ?? '' }}">
                                    </td>
                                    <td>
                                        <select id="other-role_in_activity-{{ $counter }}"
                                            count="{{ $counter }}" class="form-control other-role_in_activity"
                                            name="controll_individuals[{{ $counter }}][role_in_activity]">
                                            <option value="">(Select One)</option>
                                            
                                            <option value="Chair/Planner/Presenter" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity == 
                                                'Chair/Planner/Presenter') selected @endif>Chair/Planner/Presenter</option>
                                            
                                            <option value="Co-Chair/Planner/Presenter" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Co-Chair/Planner/Presenter') selected @endif>Co-Chair/Planner/Presenter</option>

                                            <option value="Chair/Planner" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity == 
                                                'Chair/Planner') selected @endif>Chair/Planner</option>
                                            
                                            <option value="Co-Chair/Planner" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Co-Chair/Planner') selected @endif>Co-Chair/Planner</option>

                                            
                                            <option value="Planner/Presenter" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity == 
                                                'Planner/Presenter') selected @endif>Planner/Presenter</option>
                                            
                                            <option value="Planner/Presenter (Fellow)" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Planner/Presenter (Fellow)') selected @endif>Planner/Presenter (Fellow)
                                            </option>
                                            
                                            <option value="Planner/Presenter (Student)" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity == 
                                            'Planner/Presenter (Student)') selected @endif>Planner/Presenter (Student)</option>

                                            <option value="Planner/Presenter (Patient)" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity == 
                                            'Planner/Presenter (Patient)') selected @endif>Planner/Presenter (Patient)</option>
                                            
                                            <option value="Planner/Presenter (Patient Caregiver)" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity == 
                                            'Planner/Presenter (Patient Caregiver)') selected @endif>Planner/Presenter (Patient Caregiver)</option>
                                            
                                            <option value="Presenter" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Presenter') selected @endif>Presenter</option>
                                            
                                            <option value="Nurse Planner" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Nurse Planner') selected @endif>Nurse Planner
                                            </option>

                                            <option value="Pharmacist Planner" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Pharmacist Planner') selected @endif>Pharmacist Planner
                                            </option>

                                                <option value="Planner" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Planner') selected @endif>Planner
                                            </option>

                                                <option value="Content/Peer Reviewer" @if (!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity ==
                                                'Content/Peer Reviewer') selected @endif>Content/Peer Reviewer
                                            </option>
                                            
                                            <option value="other" @if (!empty($controll_individual->role_in_activity) && !in_array($controll_individual->role_in_activity,
                                                $role_in_activity_arr)) selected @endif>other</option>
                                        </select>

                                        <br>
                                        <input id="specify-role_in_activity-{{ $counter }}" class="form-control @if ((!empty($controll_individual->role_in_activity) &&
                                                in_array($controll_individual->role_in_activity,
                                                $role_in_activity_arr)) ||
                                                empty($controll_individual->role_in_activity)) d-none @endif"
                                            type="text"
                                            name="controll_individuals[{{ $counter }}][role_in_activity]"
                                            value="{{ $controll_individual->role_in_activity ?? '' }}">
                                    </td>
                                    <td>
                                        <select class="form-control"
                                            name="controll_individuals[{{ $counter }}][commercial_interest]">
                                            <option value="None" @if (!empty($controll_individual->commercial_interest) && $controll_individual->commercial_interest == 'None') selected
                                                @endif>None</option>
                                            <option value="See Attachment 2B" @if (!empty($controll_individual->
                                                commercial_interest) &&
                                                $controll_individual->commercial_interest == 'See Attachment 2B')
                                                selected @endif>See Attachment 2B
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control"
                                            name="controll_individuals[{{ $counter }}][nature_of_relationship]">
                                            <option value="N/A" @if (!empty($controll_individual->nature_of_relationship) &&
                                                $controll_individual->nature_of_relationship == 'N/A') selected
                                                @endif>N/A</option>
                                            <option value="See Attachment 2B" @if (!empty($controll_individual->nature_of_relationship) &&
                                                $controll_individual->nature_of_relationship == 'See Attachment 2B') selected @endif>See Attachment 2B
                                            </option>
                                        </select>
                                    </td>
                                    <td><a class="btn btn-danger btn-xs RCIB" type="button"
                                            onclick="removeControlIndividual({{ $counter }}, {{ $project->id }})"><i
                                                class="fa fa-times"></i></a></td>
                                </tr>
                                @php
                                $counter++;
                                @endphp
                                @endforeach
                                @else
                                <tr class="control_individuals">
                                    <td><input class="form-control expandable" type="text"
                                            name="controll_individuals[1][name_of_individual]" value="">
                                    </td>
                                    <td>
                                        <select id="other-role_in_activity-1" class="form-control"
                                            name="controll_individuals[1][role_in_activity]">
                                            <option value="">(Select One)</option>
                                            <option value="Chair/Planner/Presenter">Chair/Planner/Presenter</option>
                                            <option value="Co-Chair/Planner/Presenter">Co-Chair/Planner/Presenter</option>
                                            <option value="Chair/Planner">Chair/Planner</option>
                                            <option value="Co-Chair/Planner">Co-Chair/Planner</option>
                                            <option value="Planner/Presenter">Planner/Presenter</option>
                                            <option value="Planner/Presenter (Fellow)">Planner/Presenter (Fellow)</option>
                                            <option value="Planner/Presenter (Student)">Planner/Presenter (Student)</option>
                                            <option value="Planner/Presenter (Patient)">Planner/Presenter (Patient)</option>
                                            <option value="Planner/Presenter (Patient Caregiver)">Planner/Presenter (Patient Caregiver)</option>
                                            <option value="Presenter">Presenter</option>
                                            <option value="Nurse Planner">Nurse Planner</option>
                                            <option value="Pharmacist Planner">Pharmacist Planner</option>
                                            <option value="Planner">Planner</option>
                                            <option value="Content/Peer Reviewer">Content/Peer Reviewer</option>
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
                                            <option value="See Attachment 2B">See Attachment 2B</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control"
                                            name="controll_individuals[1][nature_of_relationship]">
                                            <option value="N/A">N/A</option>
                                            <option value="See Attachment 2B">See Attachment 2B</option>
                                        </select>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                        <div class="text_Content mb-3">
                            <p>Upload Disclosure Documentation Form (DDF)</p>
                        </div>

                        <div class="text-right mb-5">
                            <button id="moreIndividualsActivity" type="button"
                                class="btn btn-primary btn-sm">Add more</button>
                        </div>
                    </div>

                    
                </div>                   
            </div>
        </div>
    </div>
     </fieldset>
      <button class='btn btn-lg btn-primary mt-8' type="submit">Update</button>
    </form>
        <div class="ibox-content mt-10">
            <div class="row">
                <div class="col-12-lg">

                        <div class="input-group col-md-12 mb-4">
                            <div class="input-group-prepend">
                                <h5>Attachments (2B)</h5>
                            </div>
                            @include('backend.project.template.edit-template.single-attachment', [
                            'project' => $project,
                            'single_attachment' => (isset($attachments['attachment-2b'])) ? $attachments['attachment-2b'] : null,
                            'type' => 'attachment-2b',
                            'update' => 'has_attachment_2b'
                            ])
                            
                        </div>
                </div>
                </div>
            </div>
    
</div>

@include('backend.project.template.upload-modal', ['project' => $project])
