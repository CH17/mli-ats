<div class="row" id="criteriaData-{{$credit_type->id}}">
    @php
    $criteria_array = null;
    if(!empty($credit_type->criteria)){
    $criteria_array = json_decode($credit_type->criteria);
    }
    @endphp
        @foreach ($criteria_list as $key => $criteria)
        @if(!empty($criteria_array) && in_array($key, $criteria_array))
            <div class="col-md-4">
                <div class="checkbox-block checkbox checkbox-primary form-group">
                    <input class="form-check-input" type="checkbox" name="criteria_{{$credit_type->id}}[]" value="{{$key}}" checked>
                    <label class="form-check-label" for="A">{{$key}}</label>                  
                </div>
            </div>          
        @endif
    @endforeach
</div>