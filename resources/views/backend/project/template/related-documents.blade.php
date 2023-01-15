<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Grant Related Documents</h5>
    </div>
    <form id="related_documents_form" action="{{route('project-related-documents.update',['project'=>$project->id])}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ibox-content">
            @php
            $related_documents = json_decode($project->related_documents, true);
            @endphp
            <div class="text-center related_documents">
                @php $count = 0; @endphp
                @if(isset($related_documents))
                @foreach ($related_documents as $related_document)
                <div class="control-group input-group mt-10 UploadedFile">

                
                    <a href="{{ asset('storage/file/'. $related_document) }}" title="{{ $related_document }}" target="_blank">{{ $related_document }}</a>
                    <div class="input-group-btn">
                        <a class="btn btn-danger btn-xs" type="button" onclick="removeRelDocuments({{$count}})"><i class="fa fa-times"></i></a>
                    </div>                    
                </div>
                <input type="hidden" id="removeRelDocs-{{$count}}" name="remove_rel_docs[]" value="">
                @php $count++; @endphp
                @endforeach
                @endif
                <div class="input-group control-group increment mt-10">
                    <input type="file" name="related_documents[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="button">Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="control-group input-group mt-10">
                        <input type="file" name="related_documents[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="UploadButton">
                <input type="submit" class="btn btn-primary mt-10 text-left" value="Update">
            </div>
        </div>
    </form>
</div>