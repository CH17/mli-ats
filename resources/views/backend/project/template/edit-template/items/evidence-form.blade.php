<div class="panel-body">
    <div class="ibox-title">
        <h5>Evidence</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">

                 <div class="alert alert-info">
                    <h4>Title: {{ Str::words($project->activity_title, 18, '...') }}</h4>
                    <h4>Activity ID: {{ $project->activity_id }}</h4>
                </div>

                <div class="form-group mb-4">
                    <h5>Attachments</h5>
                </div>

                @include('backend.project.template.edit-template.single-attachment', [
                'project' => $project,
                'single_attachment' => (isset($attachments['attachment-1'])) ? $attachments['attachment-1'] : null,
                'title' => 'Attachment 1 - PNUM_Activity Topic/Content',
                'text' => 'The activity topic/content, e.g., agenda, brochure, program book,
                announcement, or instructional materials. If this activity is an enduring material,
                journal-based CE, or Internet CE, please include the actual CE product (or a URL and access code
                – if applicable) with your performance–in-practice. [Supported file: PDF, Word, Excel, JPEG, PNG
                & Maximum file size: 25MB]',
                'type' => 'attachment-1',
                'update' => 'has_attachment_1'
                ])

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-2a'])) ? $attachments['attachment-2a'] : null,
                'title' => 'Attachment 2A – PNUM_Tool to Identify Relevant Financial Relationships',
                'subtitle' => '[See Attachment 2B in Disclosure Section]',
                'text' => 'The form, tool, or mechanism used to identify relevant financial relationships of all individuals in control of content. [JAC 12, SCS 2.1] (NOTE:  include completed disclosure document of an individual in control of content for this  activity.) [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]' ,
                'type' => 'attachment-2a',
                'update' => 'has_attachment_2a'
                ])

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-2b'])) ? $attachments['attachment-2b'] : null,
                'title' => 'Attachment 2B – PNUM_Tool to Identify Relevant Financial Relationships',
                'subtitle' => '[See Attachment 2B in Disclosure Section]',
                'text' => 'The form, tool, or mechanism used to identify and mitigate relevant financial relationships of all individuals in control of content. [JAC 12, SCS 2.1] (NOTE: See instructions on page 1 - include table or attachment (completed DDF) with relevant financial relationships of all individuals in control of content for this activity.) [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]' ,
                'type' => 'attachment-2b',
                'update' => 'has_attachment_2b'
                ])

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-3'])) ? $attachments['attachment-3'] : null,
                'title' => 'Attachment 3 – PNUM_Relevance/Absence of Financial Relationships Disclosure
                Information
                to
                Learners',
                'text' => 'The disclosure information as provided to learners about the relevant financial
                relationships
                (or absence of relevant financial relationships) that each individual in a position to control
                the
                content of CE disclosure to the provider [JAC 12, SCS 6.1-6.2,6.5] [Supported file: PDF, Word,
                Excel,
                JPEG, PNG & Maximum file size: 25MB]',
                'type' => 'attachment-3',
                'update' => 'has_attachment_3'
                ])

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-4'])) ? $attachments['attachment-4'] : null,
                'title' => 'Attachment 4 – PNUM_Changes in Healthcare Team Skills/Strategies or Performance or Patient
                Outcome',
                'text' => 'The data or information generated from this activity about changes in the healthcare
                teams’
                skills/strategy or performance and/or patient outcomes',
                'type' => 'attachment-4'
                ])

                <form id="updateMemo" action="{{ route('project-memo.update', ['project' => $project->id]) }}"
                    method="POST" class="mb-20">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="attachment4_memo">Memo</label>
                    <textarea name="attachment4_memo" id="attachment4_memo" cols="120" rows="10">{{ $project->attachment4_memo}}</textarea>
                    <input type="submit" class="btn btn-primary text-left mt-10"  value="Update">
                </form>

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-5'])) ? $attachments['attachment-5'] : null,
                'title' => 'Attachment 5 – PNUM_Joint Accreditation Statements to Learners',
                'text' => 'The Joint Accreditation statement for this activity, as provided to learners.
                [Appropriate
                Joint Accreditation Statement] [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size:
                25MB]',
                'type' => 'attachment-5',
                'update' => 'has_attachment_5'
                ])

                <h4>If the activity was COMMERCIALLY SUPPORTED</h4>
                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-6'])) ? $attachments['attachment-6'] : null,
                'title' => 'Attachment 6 – PNUM_Income and Expense',
                'text' => 'The income and expense statement for this activity that details the receipt and
                expenditure
                of all of the commercial support.',
                'type' => 'attachment-6',
                'update' => 'has_attachment_6'
                ])

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-7'])) ? $attachments['attachment-7'] : null,
                'title' => 'Attachment 7 – PNUM_Fully Executed LOA',
                'text' => 'Each executed commercial support agreement for the activity [JAC 12, SCS 3.4-3.6]
                [Supported
                file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]',
                'type' => 'attachment-7',
                'update' => 'has_attachment_7'
                ])

                @include('backend.project.template.edit-template.single-attachment', [
                'single_attachment' => (isset($attachments['attachment-8'])) ? $attachments['attachment-8'] : null,
                'title' => 'Attachment 8 – PNUM_Commercial Support Disclosure Provided to Learners',
                'text' => 'The commercial support disclosure information as provided to learners [JAC 12, SCS
                6.3-6.5]
                [Supported file: PDF, Word, Excel, JPEG, PNG & Maximum file size: 25MB]',
                'type' => 'attachment-8',
                'update' => 'has_attachment_8'
                ])

            </div>
        </div>
    </div>
</div>

@include('backend.project.template.upload-modal', ['project' => $project])
