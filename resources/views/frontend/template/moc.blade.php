<div id="moc-board-{{ $moc_board->id }}">
    
    <hr>
    <div class="form-group row mb-3 mt-3">
        <div class="col-md-3"><label for="moc_credit_types">{{$moc_board->board_code}}</label></div>
        <div class="col-md-9">
            <div class="row">
                @if(!empty($moc_credit_types))
                    <div class="col-md-6">                    
                        @foreach ($moc_credit_types as $moc_credit_type)                
                            <div class="checkbox checkbox-primary">
                                <input class="form-check-input" type="checkbox" name="moc_credit_types[]"
                                    value="{{$moc_credit_type->id}}" id="{{$moc_credit_type->id}}">
                                <label class="form-check-label"
                                    for="{{$moc_credit_type->id}}">{{$moc_credit_type->credit_type}}</label>
                            </div>                
                            @endforeach                    
                    </div>
                @endif

                @if(!empty($moc_practices))
                    <div class="col-md-6">                        
                        @foreach ($moc_practices as $moc_practice)                   
                            <div class="checkbox checkbox-primary">
                                <input class="form-check-input" type="checkbox" name="moc_practices[]"
                                    value="{{$moc_practice->id}}" id="{{ $moc_practice->id }}">
                                <label class="form-check-label"
                                    for="{{ $moc_practice->id }}">{{$moc_practice->practice_areas}}</label>
                            </div>                  
                        @endforeach                        
                    </div>     
                @endif           
            </div>
        </div>
    </div>    
</div>