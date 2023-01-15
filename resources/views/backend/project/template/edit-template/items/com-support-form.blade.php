<div class="panel-body">

    <form id="eForm" action="{{ route('project.commercial-support.store', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}

    <div class="ibox-title">
        <h5>Commercial Support</h5>
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
                
                <fieldset class="">
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
                                        <th class="amountCommercialSupport">Amount $US</th>
                                        <th class="inKind">In-Kind</th>
                                        <th class="fe-loa">FE-LOA</th>
                                        <th class="delete text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $commercial_supporters = json_decode($project->meta->commercial_supporters);
                                    @endphp
                                    @if (!empty($commercial_supporters))
                                        @foreach ($commercial_supporters as $key => $commercial_supporter)
                                            <tr id="com_support_{{ $key }}">
                                                <td>
                                                    <input class="form-control" type="text"
                                                        name="commercial_supporters[{{ $key }}][name]"
                                                        value="{{ $commercial_supporter->name ?? null }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="commercial_supporters[{{ $key }}][grant_id]"
                                                        value="{{ $commercial_supporter->grant_id ?? null }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="commercial_supporters[{{ $key }}][amount]"
                                                        value="{{ $commercial_supporter->amount ?? null }}">
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-primary mt-6">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            name="commercial_supporters[{{ $key }}][in_kind]"
                                                            @if (!empty($commercial_supporter->in_kind) && $commercial_supporter->in_kind == 1) checked @endif>
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-primary mt-6">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            name="commercial_supporters[{{ $key }}][fe_loa]"
                                                            @if (!empty($commercial_supporter->fe_loa) && $commercial_supporter->fe_loa == 1) checked @endif>
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="mt-6 removeAttachment7-{{ $key }}">
                                                            <a class="btn btn-danger btn-xs"
                                                                href="javascript:void(0)"
                                                                onclick="removeAttachment7({{ $key }})"><i
                                                                    class="fa fa-times"></i></a>
                                                        </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr id="com_support_1">
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
                                            <td></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <div class="text_Content mb-3">
                                <p>(If there are additional commercial supporters, please attach a separate page
                                    using
                                    the same column headings.)</p>
                            </div>

                            <div class="text-right mb-5">
                                <button id="moreCommercialActivity" type="button" class="btn btn-primary btn-sm">Add
                                    more</button>
                            </div>
                        </div>

                        <div class="input-group col-md-12 mb-4">
                            <div class="input-group-prepend">
                                <h5>Attachment 7</h5>
                            </div>
                            @include('backend.project.template.edit-template.single-attachment', [
                            'project' => $project,
                            'single_attachment' => (isset($attachments['attachment-7'])) ? $attachments['attachment-7'] : null,
                            'type' => 'attachment-7'
                            ])
                            
                        </div>
                    </div>                    
            </div>
        </div>
    </div>
    </fieldset>
        <button class='btn btn-lg btn-primary' type="submit">Update</button>
    </form>
</div>
@include('backend.project.template.upload-modal', ['project' => $project])
