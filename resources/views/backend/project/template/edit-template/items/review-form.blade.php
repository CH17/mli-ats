<div class="panel-body">
    <div class="ibox-title">
        <h5>Review Attachments</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">

                 <div class="alert alert-info">
                    <h4>Title: {{ Str::words($project->activity_title, 18, '...') }}</h4>
                    <h4>Activity ID: {{ $project->activity_id }}</h4>
                </div>

                @foreach ($attachments as $key => $attachment_type)
                    <div class="form-group mb-4">
                        <h5>{{ Str::ucfirst($key) }}</h5>
                    </div>
                    <div class="mt-10">
                        <table class="table table-borderless">
                            <tbody>
                                @if (isset($attachment_type))

                                    @forelse ($attachment_type as $attachment)
                                        <tr class="control-group">
                                            <td>
                                                <a href="{{ asset('storage/file/' . $attachment->file) }}"
                                                    target="_blank">{{ $attachment->file }}</a>
                                                <span
                                                    class="ml-2 badge badge-warning">{{ $attachment->status }}</span>
                                            </td>

                                            <td class="text-left">
                                                <b>Last Comment: </b>{{ ($attachment->comment) ? $attachment->comment : 'N/A' }}
                                            </td>
                                            <td class="text-right">

                                                <button data-file="{{ $attachment->id }}"
                                                    data-status="{{ $attachment->status }}"
                                                    data-name="{{ $attachment->type }}"
                                                    data-update="{{ $key }}"
                                                    class="review_modal btn btn-sm btn-info" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Review Attachment">Review
                                                    now!</button>

                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>

@include('backend.project.template.review-modal')
