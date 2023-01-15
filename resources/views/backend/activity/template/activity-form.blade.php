<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Activity Details</h5>
    </div>

    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <fieldset>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="activity_title">Activity Title</label>
                            <div class="form-group">
                                <input name="activity_title" type="text" class="form-control"
                                    placeholder="Activity Title" value="">
                                <div class="error_activity_title error_message"></div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="activity_url">Activity URL</label>
                            <div class="form-group">
                                <input name="activity_url" type="text" class="form-control"
                                    placeholder="Activity URL" value="">
                                <div class="error_activity_url error_message"></div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>MLI PNUM</label>
                            <div class="form-group">
                                <input type="text" class="form-control" value="" name="project_code">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="providership">Activity Overview</label>
                            <div class="form-group">
                                <select id="AddProvidership" class="form-control chosen-select" name="providership"
                                    data-placeholder="(Select one)">
                                    <option selected></option>
                                    <option value="Direct">Direct</option>
                                    <option value="Joint">Joint</option>
                                </select>
                            </div>
                        </div>                    

                        <div class="form-group col-md-6 d-none JP">
                            <label for="jp_id">Joint Provider</label>
                            <div class="form-group">
                                <select id="AddJointProvider" class="form-control chosen-select" name="jp_id" data-placeholder="(Select one)">
                                    <option selected></option>
                                    @foreach ($joint_providers as $joint_provider)
                                    <option value="{{ $joint_provider->id }}">{{ $joint_provider->jp_code }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="clear"></div>

                        <div class="form-group col-md-6">
                            <label for="jp_cr_code">JP CR Code</label>
                            <div class="form-group">
                                <input type="text" id="jp_cr_code" class="form-control" value="" name="jp_cr_code">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="accreditation_type_4_ipce">Accreditation</label>
                            <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="accreditation_type_4_ipce"
                                            name="accreditation_type_4_ipce" value="IPCE">
                                        <label class="form-check-label" for="accreditation_type_4_ipce">IPCE</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input" type="radio" id="accreditation_type_4_non_ipce"
                                            name="accreditation_type_4_ipce" value="Non-IPCE" >
                                        <label class="form-check-label" for="accreditation_type_4_non_ipce">Non-IPCE</label>
                                    </div>
                                </div>                             
                            </div>
                            </div>
                        </div>


                        <div class="clear"></div>
                        <div class="form-group col-md-4 start-activity">
                            <label for="jp_2">Joint Provider 2</label>                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input has_jp_2" id="jp_2_yes" type="radio" 
                                            name="has_jp_2" value="1">
                                        <label class="form-check-label" for="jp_2_yes">Yes</label>
                                    </div>
                                </div>                                    
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input has_jp_2" id="jp_2_no" type="radio" 
                                            name="has_jp_2" value="0" checked>
                                        <label class="form-check-label" for="jp_2_no">No</label>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="form-group col-md-4 d-none JP2">
                            <label for="jp_id_2">Joint Provider 2</label>
                            <div class="form-group">
                                <select id="AddJointProvider2" class="form-control chosen-select" name="jp_id_2" data-placeholder="(Select one)">
                                    <option selected></option>
                                    @foreach ($joint_providers as $joint_provider)
                                    <option value="{{ $joint_provider->id }}">{{ $joint_provider->jp_code }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="AddJPContacts2" class="form-group col-md-4 d-none">

                        </div>

                        <div class="clear"></div>

                        <div class="form-group col-md-4 start-activity">
                            <label for="jp_3">Joint Provider 3</label>                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input has_jp_3" type="radio"  id="jp_3_yes"
                                            name="has_jp_3" value="1">
                                        <label class="form-check-label" for="jp_3_yes">Yes</label>
                                    </div>
                                </div>                                    
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input has_jp_3" type="radio"  id="jp_3_no"
                                            name="has_jp_3" value="0" checked>
                                        <label class="form-check-label" for="jp_3_no">No</label>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="form-group col-md-4 d-none JP3">
                            <label for="jp_id_3">Joint Provider 3</label>
                            <div class="form-group">
                                <select id="AddJointProvider3" class="form-control chosen-select" name="jp_id_3" data-placeholder="(Select one)">
                                    <option selected></option>
                                    @foreach ($joint_providers as $joint_provider)
                                    <option value="{{ $joint_provider->id }}">{{ $joint_provider->jp_code }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="AddJPContacts3" class="form-group col-md-4 d-none">

                        </div>
                        
                    </div>

                    {{-- Target Audiences --}}
                    <hr>
                    <div class="form-group row mb-3 mt-3">
                        <div class="col-md-3"><label for="target_audience">Target Audience</label>
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

                    <div class="form-group row mb-3 mt-3" id="MOC">
                        <div class="col-md-3"><label for="moc">MOC/CC</label></div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input moc" type="radio" name="moc" id="moc_yes" value="1">
                                        <label class="form-check-label" for="moc_yes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <input class="form-check-input moc" type="radio" name="moc" id="moc_no"value="0">
                                        <label class="form-check-label" for="moc_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-none" id="MocBoards">
                        <hr>
                        <div class="form-group row  mb-3 mt-3">
                            <div class="col-md-3"><label for="moc_boards">MOC/CC Boards</label></div>
                            <div class="col-md-9">
                                <div class="row">
                                    @foreach ($moc_boards as $moc_board)
                                    <div class="col-md-4">
                                        <div class="checkbox checkbox-primary">
                                            <input class="form-check-input moc_boards" type="checkbox"
                                                name="moc_boards[]" value="{{$moc_board->id}}" id="{{$moc_board->id}}">
                                            <label class="form-check-label"
                                                for="{{$moc_board->id}}">{{$moc_board->board_code}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="MocView">

                    </div>
                </fieldset>


            </div>
        </div>
    </div>
</div>


@include('backend.activity.template.commercial-support')