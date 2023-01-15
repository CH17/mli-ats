<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Disclosures</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">

                <fieldset>


                    <div class="form-group mb-4">
                        <h5>For all INDIVIDUALS IN CONTROL OF CONTENT for the activity...</h5>
                        <hr>
                        <p>Complete the table below. If you have this information already available electronically, then simply include it as part of Attachment 2. For each individual in control of content, list the name of the individual, the individual's role (e.g., planner, editor, content reviewer, faculty) in the activity, the name of the ACCME-defined commercial interest with which the individual has a relevant financial relationship (or if the individual has no relevant financial relationships), and the nature of that relationship. [JAC9, SCS 2.1, 2.2,2.3]</p>

                        <p>(Note: please ensure that when you are collectiong this information from individuals, that you are using the most current definitions of what constitutes a relevant financial relationship and ACCME-defined commercial interest.)</p>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Example: Jane Smythe, MD</td>
                                        <td>Course Director</td>
                                        <td>None</td>
                                        <td>---</td>
                                        <td>---</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Example: Thomas Jones</td>
                                        <td>Faculty</td>
                                        <td>Pharma Co. US</td>
                                        <td>Research grant</td>
                                        <td>---</td>
                                        <td></td>
                                    </tr>

                                    @php
                                    $controll_individuals=json_decode($project->meta->controll_individuals);
                                    @endphp
                                    @if(!empty($controll_individuals))
                                    @php
                                    $counter=1;
                                    $role_in_activity_arr = array("Chair/Course Director", "Faculty", "Content/Peer Reviewer", "Nurse Planner", "Pharmacist Planner", "Planning Committee", "Planner", "Faculty/Planner");
                                    @endphp
                                    @foreach($controll_individuals as $key=>$controll_individual)
                                    <tr class="control_individuals">
                                        <td><input class="form-control expandable" type="text" name="controll_individuals[{{$counter}}][name_of_individual]" value="{{$controll_individual->name_of_individual ?? ''}}"></td>
                                        <td>
                                            <select id="other-role_in_activity-{{$counter}}" count="{{$counter}}" class="form-control other-role_in_activity" name="controll_individuals[{{$counter}}][role_in_activity]">
                                                <option value="">(Select One)</option>
                                                <option value="Chair/Course Director" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Chair/Course Director") selected @endif>Chair/Course Director</option>
                                                <option value="Faculty" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Faculty") selected @endif>Faculty</option>
                                                <option value="Content/Peer Reviewer" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Content/Peer Reviewer") selected @endif>Content/Peer Reviewer</option>
                                                <option value="Nurse Planner" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Nurse Planner") selected @endif>Nurse Planner</option>
                                                <option value="Pharmacist Planner" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Pharmacist Planner") selected @endif>Pharmacist Planner</option>
                                                <option value="Planning Committee" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Planning Committee") selected @endif>Planning Committee</option>
                                                <option value="Planner" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Planner") selected @endif>Planner</option>
                                                <option value="Faculty/Planner" @if(!empty($controll_individual->role_in_activity) && $controll_individual->role_in_activity=="Faculty/Planner") selected @endif>Faculty/Planner</option>
                                                <option value="other" @if(!empty($controll_individual->role_in_activity) && !in_array($controll_individual->role_in_activity, $role_in_activity_arr)) selected @endif">other</option>
                                            </select>
                                            <br>
                                            <input id="specify-role_in_activity-{{$counter}}" class="form-control @if((!empty($controll_individual->role_in_activity) && in_array($controll_individual->role_in_activity, $role_in_activity_arr)) || empty($controll_individual->role_in_activity)) d-none @endif" type="text" name="controll_individuals[{{$counter}}][role_in_activity]" value="{{$controll_individual->role_in_activity ?? ''}}">
                                        </td>
                                        <td>
                                            <select class="form-control" name="controll_individuals[{{$counter}}][commercial_interest]">
                                                <option value="None" @if(!empty($controll_individual->commercial_interest) && $controll_individual->commercial_interest=='None') selected @endif>None</option>
                                                <option value="See Attachment B" @if(!empty($controll_individual->commercial_interest) && $controll_individual->commercial_interest=='See Attachment B') selected @endif>See Attachment B</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="controll_individuals[{{$counter}}][nature_of_relationship]">
                                                <option value="N/A" @if(!empty($controll_individual->nature_of_relationship) && $controll_individual->nature_of_relationship=='N/A') selected @endif>N/A</option>
                                                <option value="See Attachment B" @if(!empty($controll_individual->nature_of_relationship) && $controll_individual->nature_of_relationship=='See Attachment B') selected @endif>See Attachment B</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" name="controll_individuals[{{$counter}}][mechanisms]" value="{{$controll_individual->mechanisms ?? ''}}"></td>
                                        <td><a class="btn btn-danger btn-xs RCIB" type="button" onclick="removeControlIndividual({{$counter}}, {{$project->id}})"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
                                    @else
                                    <tr class="control_individuals">
                                        <td><input class="form-control expandable" type="text" name="controll_individuals[1][name_of_individual]" value=""></td>
                                        <td>
                                            <select id="other-role_in_activity-1" class="form-control" name="controll_individuals[1][role_in_activity]">
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
                                            <input id="specify-role_in_activity-1" class="form-control d-none" type="text" name="controll_individuals[1][role_in_activity]" value="">
                                        </td>
                                        <td>
                                            <select class="form-control" name="controll_individuals[1][commercial_interest]">
                                                <option value="None">None</option>
                                                <option value="See Attachment B">See Attachment B</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="controll_individuals[1][nature_of_relationship]">
                                                <option value="N/A">N/A</option>
                                                <option value="See Attachment B">See Attachment B</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control" type="text" name="controll_individuals[1][mechanisms]" value=""></td>
                                    </tr>
                                    @endif



                                </tbody>
                            </table>

                            <div class="text_Content mb-3">
                                <p>(If there are additional individuals in control of content for the activity, please attach a separate page using the same column headings.)</p>
                            </div>

                            <div class="text-right mb-5">
                                <button id="moreIndividualsActivity" type="button" class="btn btn-primary btn-sm">Add more</button>
                            </div>
                        </div>

                        @php
                        $dis_attachments = json_decode($project->meta->dis_attachments, true);
                        @endphp
                        <div class="input-group dis_attachments col-md-12 mb-4">
                            <div class="input-group-prepend">
                                <h5>Attachments</h5>
                            </div>
                            @php $count = 0; @endphp
                            @if(isset($dis_attachments))
                            @foreach ($dis_attachments as $dis_attachment)
                            <div class="control-group input-group mt-10">
                                <a href="{{ asset('storage/file/'. $dis_attachment) }}" target="_blank">{{$dis_attachment}}</a>
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button" onclick="RemoveAttactmentDIS({{$count}})">Remove</button>
                                </div>
                            </div>
                            <input type="hidden" id="RemoveAttactmentDIS-{{$count}}" name="remove_dis_attachments[]" value="">
                            @php $count++; @endphp
                            @endforeach
                            @endif

                            <div class="input-group control-group increment mt-10">
                                <input type="file" name="dis_attachments[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="button">Add</button>
                                </div>
                            </div>
                            <div class="clone d-none">
                                <div class="control-group input-group mt-10">
                                    <input type="file" name="dis_attachments[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>
    </div>
</div>