<div id="levelTextNonMliData-{{$credit_type->id}}">
    @if(!empty($credit_type->level))
    <label for="level">{{$credit_type->level}}</label>    
    <div class="form-group">
        <input name="non_mli_level_data_{{$credit_type->id}}" type="text" class="form-control" placeholder="">
    </div>     
    @endif
</div>