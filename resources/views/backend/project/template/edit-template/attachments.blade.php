<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Commercial Support</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <fieldset class="AttachmentsWrap">


                    <div class="form-group mb-4">
                        <label for="has_commercial_support">Commercial Support Received</label>
                        <select id="has_commercial_support" class="form-control" name="has_commercial_support"
                            data-placeholder="(Select one)">
                            <option selected></option>
                            <option value="Yes" @if ($project->has_commercial_support == 'Yes') selected @endif>Yes</option>
                            <option value="No" @if ($project->has_commercial_support == 'No') selected @endif>No
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <h5>If the activity was COMMERCIALLY SUPPORTED...</h5>
                        <hr>
                        <p>Complete the table below. If you have this information already available electronically, then
                            simply include it as part of Attachment 7. List the names of the commercial supporters of
                            this activity and the dollar value of any monetary commercial support and/or indicate
                            in-kind support [JAC12, SCS 3.4-3.6].</p>
                        <hr>
                    </div>
                    <div class="form-group mb-5">
                        <div class="tableContentWrap">
                            <table id="commercialActivity" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="commercialSupport">Name of commercial supporter</th>
                                        <th class="commercialSupport">Grant Number</th>
                                        <th class="amountCommercialSupport">Amount $US</th>
                                        <th class="inKind">In-Kind</th>
                                        <th class="fe-loa">FE-LOA</th>
                                        <th class="attachment7Title">Attachment #7</th>
                                        <th class="delete text-center">Delete</th>
                                        <th class="upload">Upload</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $commercial_supporters = json_decode($project->meta->commercial_supporters);
                                    @endphp
                                    @if (!empty($commercial_supporters))
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($commercial_supporters as $key => $commercial_supporter)
                                            <tr>
                                                <td>
                                                    <input class="form-control" type="text"
                                                        name="commercial_supporters[{{ $counter }}][name]"
                                                        value="{{ $commercial_supporter->name ?? null }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="commercial_supporters[{{ $counter }}][grant_id]"
                                                        value="{{ $commercial_supporter->grant_id ?? null }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="commercial_supporters[{{ $counter }}][amount]"
                                                        value="{{ $commercial_supporter->amount ?? null }}">
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-primary mt-6">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            name="commercial_supporters[{{ $counter }}][in_kind]"
                                                            @if (!empty($commercial_supporter->in_kind) && $commercial_supporter->in_kind == 1) checked @endif>
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-primary mt-6">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            name="commercial_supporters[{{ $counter }}][fe_loa]"
                                                            @if (!empty($commercial_supporter->fe_loa) && $commercial_supporter->fe_loa == 1) checked @endif>
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td class="attachment7Title">
                                                    <div class="UploadedAttachment7File mt-6">
                                                        <div id="UploadedAttachment7File-{{ $counter }}">
                                                            @if (!empty($commercial_supporter->support_attachment_7))
                                                                <a target="_blank"
                                                                    href="{{ asset('/storage/file/' . $commercial_supporter->support_attachment_7) }}"
                                                                    class="UploadedFile{{ $counter }}">{{ $commercial_supporter->support_attachment_7 }}</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if (!empty($commercial_supporter->support_attachment_7))
                                                        <div class="mt-6 removeAttachment7-{{ $counter }}">
                                                            <a class="btn btn-danger btn-xs" href="javascript:void(0)"
                                                                onclick="removeAttachment7({{ $counter }})"><i
                                                                    class="fa fa-times"></i></a>
                                                        </div>
                                                        <input type="hidden" id="remove-attach-7-{{ $counter }}"
                                                            name="remove_attach_7[]" value="">
                                                    @endif
                                                </td>


                                                <td class="UploadAttachment7 input-group custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="support_attachment_7_{{ $counter }}"
                                                        name="support_attachment_7_{{ $counter }}">
                                                    @if (!empty($commercial_supporter->support_attachment_7))
                                                        <label
                                                            class="custom-file-label UploadFile{{ $counter }} d-none"
                                                            for="support_attachment_7_{{ $counter }}"></label>
                                                    @else
                                                        <label class="custom-file-label UploadFile{{ $counter }}"
                                                            for="support_attachment_7_{{ $counter }}"></label>
                                                    @endif
                                                </td>

                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text"
                                                    name="commercial_supporters[1][name]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="commercial_supporters[1][grant_id]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="commercial_supporters[1][amount]" value="">
                                            </td>
                                            <td>
                                                <div class="checkbox checkbox-primary mt-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="commercial_supporters[1][in_kind]">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox checkbox-primary mt-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="commercial_supporters[1][fe_loa]">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td class="attachment7Title">
                                                <div class="UploadedAttachment7File mt-6"></div>
                                            </td>
                                            <td></td>
                                            <td class="UploadAttachment7 input-group custom-file">
                                                <input type="file" class="custom-file-input" id="support_attachment_7_1"
                                                    name="support_attachment_7_1">
                                                <label class="custom-file-label" for="support_attachment_7_1"></label>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <div class="text_Content mb-3">
                                <p>(If there are additional commercial supporters, please attach a separate page using
                                    the same column headings.)</p>
                            </div>

                            <div class="text-right mb-5">
                                <button id="moreCommercialActivity" type="button" class="btn btn-primary btn-sm">Add
                                    more</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Evidence</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <fieldset class="AttachmentsWrap0">

                    <div class="form-group mb-4">
                        <h5>Attachments</h5>
                    </div>
                    @php
                        // $attachments = json_decode($project->meta->attachments, true);
                        // $attachments1 = !empty($attachments[1]) ? json_decode($attachments[1], true) : null;
                        // $attachments2 = !empty($attachments[2]) ? json_decode($attachments[2], true) : null;
                        // $attachments3 = !empty($attachments[3]) ? json_decode($attachments[3], true) : null;
                        // $attachments4 = !empty($attachments[4]) ? json_decode($attachments[4], true) : null;
                        // $attachments6 = !empty($attachments[6]) ? json_decode($attachments[6], true) : null;
                    @endphp

                    <div class="input-group attachment1 col-md-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 1</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($attachments1))
                            @foreach ($attachments1 as $attachment1)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment1) }}"
                                        target="_blank">{{ $attachment1 }}</a>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                            onclick="RemoveAttactmentEVD(1, {{ $count }})">Remove</button>
                                    </div>
                                </div>
                                <input type="hidden" id="RemoveAttactmentEVD-1-{{ $count }}"
                                    name="RemoveEVDAttactments1[]" value="">
                                @php $count++; @endphp
                            @endforeach
                        @endif

                        <div class="input-group control-group increment mt-10">
                            <input type="file" name="Attachment_1[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group mt-10">
                                <input type="file" name="Attachment_1[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button">Remove</button>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3">The activity topic/content, e.g., agenda, brochure, program book, announcement,
                            or instructional materials. If this activity is an enduring material, journal-based CE, or
                            Internet CE, please include the actual CE product (or a URL and access code – if
                            applicable) with your performance–in-practice. [Supported file: PDF, Word, Excel, JPEG, PNG
                            & Maximum file size: 25MB]</p>
                        <div class="error_Attachment_1 error_message"></div>
                    </div>

                    <div class="input-group attachment2 col-md-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 2 [See Attachment 2B in Disclosure Section]</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($attachments2))
                            @foreach ($attachments2 as $attachment2)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment2) }}"
                                        target="_blank">{{ $attachment2 }}</a>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                            onclick="RemoveAttactmentEVD(2, {{ $count }})">Remove</button>
                                    </div>
                                </div>
                                <input type="hidden" id="RemoveAttactmentEVD-2-{{ $count }}"
                                    name="RemoveEVDAttactments2[]" value="">
                                @php $count++; @endphp
                            @endforeach
                        @endif

                        <div class="input-group control-group increment mt-10">
                            <input type="file" name="Attachment_2[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group mt-10">
                                <input type="file" name="Attachment_2[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button">Remove</button>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3">The form, tool, or mechanism used to identify relevant financial relationships
                            of all individuals in control of content. [JAC 9, SCS 2.1] (NOTE: See instructions on page 1
                            – include table or attachment with relevant financial relationships of all individuals in
                            control of content for this activity. [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum
                            file size: 25MB]</p>
                        <div class="error_Attachment_2 error_message"></div>
                    </div>

                    {{-- <div class="input-group attachment3 col-md-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 3</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($attachments3))
                        @foreach ($attachments3 as $attachment3)
                        <div class="control-group input-group mt-10">
                            <a href="{{ asset('storage/file/'. $attachment3) }}" target="_blank">{{$attachment3}}</a>
                    <div class="input-group-btn">
                        <button class="btn btn-danger" type="button" onclick="RemoveAttactmentEVD(3, {{$count}})">Remove</button>
                    </div>
            </div>
            <input type="hidden" id="RemoveAttactmentEVD-3-{{$count}}" name="RemoveEVDAttactments3[]" value="">
            @php $count++; @endphp
            @endforeach
            @endif

            <div class="input-group control-group increment mt-10">
                <input type="file" name="Attachment_3[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="button">Add</button>
                </div>
            </div>
            <div class="clone d-none">
                <div class="control-group input-group mt-10">
                    <input type="file" name="Attachment_3[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-danger" type="button">Remove</button>
                    </div>
                </div>
            </div>

            <p class="mt-3">Evidence that you implemented your mechanism(s) to resolve conflicts of interest
                for all individuals in control of content prior to the start of the activity. [JAC 9, SCS
                2.3] [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]</p>
            <div class="error_Attachment_3 error_message"></div>
        </div> --}}

                    <div class="input-group attachment4 col-md-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 3</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($attachments4))
                            @foreach ($attachments4 as $attachment4)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment4) }}"
                                        target="_blank">{{ $attachment4 }}</a>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                            onclick="RemoveAttactmentEVD(4, {{ $count }})">Remove</button>
                                    </div>
                                </div>
                                <input type="hidden" id="RemoveAttactmentEVD-4-{{ $count }}"
                                    name="RemoveEVDAttactments4[]" value="">
                                @php $count++; @endphp
                            @endforeach
                        @endif

                        <div class="input-group control-group increment mt-10">
                            <input type="file" name="Attachment_4[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group mt-10">
                                <input type="file" name="Attachment_4[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button">Remove</button>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3">The disclosure information as provided to learners about the relevant financial
                            relationships (or absence of relevant financial relationships) that each individual in a
                            position to control the content of CE disclosure to the provider [JAC 9, SCS 6.1-6.2,6.5]
                            [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]
                        </p>
                        <div class="error_Attachment_4 error_message"></div>
                    </div>


                    <div class="input-group attachment6 col-md-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 5</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($attachments6))
                            @foreach ($attachments6 as $attachment6)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $attachment6) }}"
                                        target="_blank">{{ $attachment6 }}</a>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                            onclick="RemoveAttactmentEVD(6, {{ $count }})">Remove</button>
                                    </div>
                                </div>
                                <input type="hidden" id="RemoveAttactmentEVD-6-{{ $count }}"
                                    name="RemoveEVDAttactments6[]" value="">
                                @php $count++; @endphp
                            @endforeach
                        @endif

                        <div class="input-group control-group increment mt-10">
                            <input type="file" name="Attachment_6[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group mt-10">
                                <input type="file" name="Attachment_6[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button">Remove</button>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3">The Joint Accreditation statement for this activity, as provided to learners.
                            [Appropriate Joint Accreditation Statement] [Supported file: PDF, Word, Excel, JPEG, PNG &
                            Maximum file size: 25MB]</p>
                        <div class="error_Attachment_6 error_message"></div>
                    </div>

                    @php
                        $support_attachments = json_decode($project->meta->support_attachments, true);
                        
                        $support_attachments8 = !empty($support_attachments[8]) ? json_decode($support_attachments[8], true) : null;
                        $support_attachments9 = !empty($support_attachments[9]) ? json_decode($support_attachments[9], true) : null;
                    @endphp
                    <div class="form-group mb-4">
                        <h5>If the activity was COMMERCIALLY SUPPORTED...</h5>
                    </div>

                    <div class="input-group attachment8 col-md-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 7 [See Attachment 7 in Commercial Support
                                Section]</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($support_attachments8))
                            @foreach ($support_attachments8 as $support_attachment8)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $support_attachment8) }}"
                                        target="_blank">{{ $support_attachment8 }}</a>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                            onclick="RemoveAttactmentEVD(8, {{ $count }})">Remove</button>
                                    </div>
                                </div>
                                <input type="hidden" id="RemoveAttactmentEVD-8-{{ $count }}"
                                    name="RemoveEVDAttactments8[]" value="">
                                @php $count++; @endphp
                            @endforeach
                        @endif

                        <div class="input-group control-group increment mt-10">
                            <input type="file" name="Attachment_8[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group mt-10">
                                <input type="file" name="Attachment_8[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button">Remove</button>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3">Each executed commercial support agreement for the activity [JAC 9, SCS 3.4-3.6]
                            [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]
                        </p>
                        <div class="error_Attachment_8 error_message w-100-p"></div>
                    </div>

                    <div class="input-group attachment9 col-md-12 mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attachment 8</span>
                        </div>
                        @php $count = 0; @endphp
                        @if (isset($support_attachments9))
                            @foreach ($support_attachments9 as $support_attachment9)
                                <div class="control-group input-group mt-10">
                                    <a href="{{ asset('storage/file/' . $support_attachment9) }}"
                                        target="_blank">{{ $support_attachment9 }}</a>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                            onclick="RemoveAttactmentEVD(9, {{ $count }})">Remove</button>
                                    </div>
                                </div>
                                <input type="hidden" id="RemoveAttactmentEVD-9-{{ $count }}"
                                    name="RemoveEVDAttactments9[]" value="">
                                @php $count++; @endphp
                            @endforeach
                        @endif

                        <div class="input-group control-group increment mt-10">
                            <input type="file" name="Attachment_9[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button">Add</button>
                            </div>
                        </div>
                        <div class="clone d-none">
                            <div class="control-group input-group mt-10">
                                <input type="file" name="Attachment_9[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button">Remove</button>
                                </div>
                            </div>
                        </div>


                        <p class="mt-3">The commercial support disclosure information as provided to learners [JAC12,
                            SCS 6.3-6.5] [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]</p>
                        <div class="error_Attachment_9 error_message w-100-p"></div>
                    </div>

                    <div class="form-group mb-5" style="margin-top: 50px;">
                        <h5>Joint Accreditation Commendation Criteria</h5>
                    </div>


                    {{-- JAC 13 --}}
                    <hr>
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
                                            <li>Includes teachers who are patients and/or public representatives</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input EditJAC13" type="radio" id="jac13_1" name="jac13"
                                            value="1" @if ($project->jac13 == 1) checked @endif>
                                        <label class="form-check-label" for="jac13_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input EditJAC13" type="radio" name="jac13" id="jac13_2"
                                            value="0" @if ($project->jac13 == 0) checked @endif>
                                        <label class="form-check-label" for="jac13_2">No</label>
                                    </div>
                                </div>

                                <div id="JAC13_extra" @if ($project->jac13 == 0) class="d-none" @endif>
                                    <div class="col-md-12 mt-6 no-padding">
                                        <div class="col-md-4">
                                            <label for="jac13_patient_planner" class="form-group">Name of Patient
                                                Planner :</label>
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
                                                Presenter :</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="jac13_patient_presenter"
                                                value="{{ $project->meta->jac13_patient_presenter }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label for="jac13_mechanism" class="form-group">Indicate the mechanism used to
                                            include patient as presenter :</label>

                                        <textarea name="jac13_mechanism" id="jac13_mechanism" class="form-control"
                                            cols="30" rows="4">{{ $project->meta->jac13_mechanism }}</textarea>

                                    </div>
                                </div>


                            </div>
                            <label for="jac13_description" class="col-form-label" style="margin-top:25px;">
                                Describe in what way the planners and presenters of the activity represent the patient
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
                            <label for="jac14">The provider engages students of the health professions as planners and
                                teachers in
                                accredited interprofessional continuing education (IPCE) and/or CE.</label>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-10">
                                    <label class="form-group">Requirements:</label>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Includes planners who are students of the health professions AND</li>
                                            <li>Includes teachers who are students of the health professions</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input EditJAC14" type="radio" id="jac14_1" name="jac14"
                                            value="1" @if ($project->jac14 == 1) checked @endif>
                                        <label class="form-check-label" for="jac14_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input EditJAC14" type="radio" name="jac14" id="jac14_2"
                                            value="0" @if ($project->jac14 == 0) checked @endif>
                                        <label class="form-check-label" for="jac14_2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div id="JAC14_extra" @if ($project->jac14 == 0) class="d-none" @endif>
                                <div class="col-md-12 mt-6 no-padding">
                                    <div class="col-md-4">
                                        <label for="jac14_patient_planner" class="form-group">Name of Patient Planner
                                            :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="jac14_patient_planner"
                                            value="{{ $project->meta->jac14_patient_planner }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12 no-padding">
                                    <div class="col-md-4">
                                        <label for="jac14_patient_presenter" class="form-group">Name of Patient
                                            Presenter :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="jac14_patient_presenter"
                                            value="{{ $project->meta->jac14_patient_presenter }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="jac14_mechanism" class="form-group">Indicate the mechanism used to
                                        include patient as presenter :</label>

                                    <textarea name="jac14_mechanism" id="jac14_mechanism" class="form-control" cols="30"
                                        rows="4">{{ $project->meta->jac14_mechanism }}</textarea>

                                </div>
                            </div>


                            <label for="jac14_description" class="col-form-label" style="margin-top:25px;">Describe the
                                health professions’
                                students involved in the
                                activity, including their profession and level of study (e.g. undergraduate medical
                                students, nurse
                                practitioner students, residents in general surgery) and how they participated as both
                                planners and faculty
                                of the activity. (maximum 250 words per example activity)
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
                        <div class="col-md-3"><label for="jac17">JAC 17</label></div>
                        <div class="col-md-9">
                            <label for="jac17">The provider advances the use of health and practice data for health care
                                improvement.
                            </label>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-10">
                                    <label class="form-group">Requirements:</label>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Teaches about collection, analysis, or synthesis of health/practice data
                                                AND</li>
                                            <li>Uses health/practice data to teach about healthcare improvement</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="jac17_1" name="jac17" value="1"
                                            @if ($project->jac17 == 1) checked @endif>
                                        <label class="form-check-label" for="jac17_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" name="jac17" id="jac17_2" value="0"
                                            @if ($project->jac17 == 0) checked @endif>
                                        <label class="form-check-label" for="jac17_2">No</label>
                                    </div>
                                </div>
                            </div>
                            <label for="jac17_description" class="col-form-label">Describe how the activity taught
                                learners about
                                collection, analysis, or synthesis of health/practice data and how the activity used
                                health/practice data to
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
                            <label for="jac18">The provider identifies and addresses factors beyond clinical care (e.g.
                                social determinants) that affect the health of the patients and integrates those factors
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
                                        <input class="form-check-input" type="radio" id="jac18_1" name="jac18" value="1"
                                            @if ($project->jac18 == 1) checked @endif>
                                        <label class="form-check-label" for="jac18_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" name="jac18" id="jac18_2" value="0"
                                            @if ($project->jac18 == 0) checked @endif>
                                        <label class="form-check-label" for="jac18_2">No</label>
                                    </div>
                                </div>
                            </div>
                            <label for="jac18_description" class="col-form-label">Describe the strategy or strategies
                                used to achieve
                                improvements in population health
                                (maximum 250 words per example)</label>
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
                            <label for="jac19">The provider collaborates with other organizations to more effectively
                                address population
                                health issues.</label>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-10">
                                    <label class="form-group">Requirements:</label>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Creates or continues collaborations with one or more healthcare or
                                                community organization(s)
                                                AND</li>
                                            <li>Demonstrates that the collaborations augment the provider’s ability to
                                                address population
                                                health issues</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="jac19_1" name="jac19" value="1"
                                            @if ($project->jac19 == 1) checked @endif>
                                        <label class="form-check-label" for="jac19_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" name="jac19" id="jac19_2" value="0"
                                            @if ($project->jac19 == 0) checked @endif>
                                        <label class="form-check-label" for="jac19_2">No</label>
                                    </div>
                                </div>
                            </div>
                            <label for="jac19_description" class="col-form-label">Describe the nature of the
                                collaboration (new/continued)
                                with one or more healthcare or community organization(s) AND demonstrate that the
                                collaboration augmented
                                MLI’s ability to address population health issues.</label>
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
                        <div class="col-md-3"><label for="jac23">JAC 23</label></div>
                        <div class="col-md-9">
                            <label for="jac24">The provider demonstrates improvement in the performance of the
                                healthcare team as a result of its overall IPCE program.</label>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-10">
                                    <label class="form-group">Requirements:</label>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Collaborates in the process of healthcare quality improvement AND</li>
                                            <li>Demonstrates improvement in healthcare quality</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="jac23_1" name="jac23" value="1"
                                            @if ($project->jac23 == 1) checked @endif>
                                        <label class="form-check-label" for="jac23_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" name="jac23_2" id="jac23" value="0"
                                            @if ($project->jac23 == 0) checked @endif>
                                        <label class="form-check-label" for="jac23_2">No</label>
                                    </div>
                                </div>
                            </div>
                            <label for="jac23_description" class="col-form-label">Describe how MLI collaborated in the
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
                            <label for="jac24">The provider demonstrates healthcare quality improvement achieved through
                                the involvement of
                                its overall IPCE program. </label>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-10">
                                    <label class="form-group">Requirements:</label>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Collaborates in the process of healthcare quality improvement AND</li>
                                            <li>Demonstrates improvement in healthcare quality</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="jac24_1" name="jac24" value="1"
                                            @if ($project->jac24 == 1) checked @endif>
                                        <label class="form-check-label" for="jac24_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" name="jac24" id="jac24_2" value="0"
                                            @if ($project->jac24 == 0) checked @endif>
                                        <label class="form-check-label" for="jac24_2">No</label>
                                    </div>
                                </div>
                            </div>
                            <label for="jac24_description" class="col-form-label">Describe how MLI collaborated in the
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
                            <label for="jac25">The provider demonstrates the positive impact of its overall IPCE program
                                on patients or
                                their communities.</label>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-10">
                                    <label class="form-group">Requirements:</label>
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Collaborates in the process of improving patient or community health AND
                                            </li>
                                            <li>Demonstrates improvement in patient or community outcomes</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="jac25_1" name="jac25" value="1"
                                            @if ($project->jac25 == 1) checked @endif>
                                        <label class="form-check-label" for="jac25_1">Yes</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" name="jac25" id="jac25_2" value="0"
                                            @if ($project->jac25 == 0) checked @endif>
                                        <label class="form-check-label" for="jac25_2">No</label>
                                    </div>
                                </div>
                            </div>
                            <label for="jac25_description" class="col-form-label">Describe how MLI collaboration in the
                                process of improving
                                patient or community health that included CE, along with the improvements that resulted.
                                Include data
                                (qualitative or quantitative) that demonstrates those improvements (maximum 500 words
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

                </fieldset>
                <input type="submit" class="btn btn-primary m-t-n-xs mt-15" value="Update">
            </div>
        </div>
    </div>
</div>
