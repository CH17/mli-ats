@php
$moc_credit_types_data = [];
if(!empty($project->moc_credit_types)){
foreach ($project->moc_credit_types as $data) {
array_push($moc_credit_types_data, $data->credit_type);
}
}

$moc_practices_data = [];
if(!empty($project->moc_practices)){
foreach ($project->moc_practices as $data) {
array_push($moc_practices_data, $data->practice_areas);
}
}
@endphp


<div id="edit-moc-board-{{$mocBoard->id}}">    
    <hr>
    <div class="form-group row mb-3 mt-3">
        <div class="col-md-3"><label for="moc_credit_types">{{$mocBoard->board_code}}</label></div>
        <div class="col-md-9">
            <div class="row"> 
                <div class="col-md-6">
                    @if(!empty($moc_credit_types))              
                    @foreach ($moc_credit_types as $moc_credit_type)               
                        <div class="checkbox checkbox-primary">
                            <input class="form-check-input" type="checkbox" name="moc_credit_types[]"
                                value="{{$moc_credit_type->id}}" @if(!empty($moc_credit_types_data) && in_array($moc_credit_type->credit_type,
                                $moc_credit_types_data)) checked @endif>
                            <label class="form-check-label"
                                for="{{$moc_credit_type->credit_type}}">{{$moc_credit_type->credit_type}}</label>
                        </div>               
                    @endforeach
                    @endif 
                </div>
                <div class="col-md-6">
                    @if(!empty($moc_practices))
                    @foreach ($moc_practices as $moc_practice)               
                        <div class="checkbox checkbox-primary">
                            <input class="form-check-input" type="checkbox" name="moc_practices[]"
                                value="{{$moc_practice->id}}" @if(!empty($moc_practices_data) && in_array($moc_practice->practice_areas,
                                $moc_practices_data)) checked @endif>
                            <label class="form-check-label"
                                for="{{$moc_practice->practice_areas}}">{{$moc_practice->practice_areas}}</label>
                        </div>               
                    @endforeach
                    @endif
                </div>
          </div>
        </div>
    </div>   
</div>