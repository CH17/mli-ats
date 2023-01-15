<div id="pharmacologyAmountNonMliData-{{$credit_type->id}}">
    @if(!empty($credit_type->has_pharmacology_amount) &&
    $credit_type->has_pharmacology_amount==1)
        <label for="pharmacology_amount">Pharmacology
            Amount</label>
        <div class="form-group">
            <input name="non_mli_pharmacology_amount{{$credit_type->id}}" type="text" class="form-control" placeholder="">
        </div>           
    @endif
</div>