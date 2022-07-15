<!-- Status Field -->
<div id="div-status" class="form-group col-md-6 mb-4">
    <label for="status">Status</label>
    {!! Form::text('status', null, ['id'=>'status', 'class' => 'form-control']) !!}
</div>

<!-- Offer Title Field -->
<div id="div-offer_title" class="form-group col-md-6 mb-4">
    <label for="offer_title">Offer Title</label>
    {!! Form::email('offer_title', null, ['id'=>'offer_title', 'class' => 'form-control']) !!}
</div>

<div id="div-price_per_unit" class="form-group col-md-6 mb-4">
    <label for="price_per_unit">Price Per Unit</label>
        {!! Form::number('price_per_unit', null, ['id'=>'price_per_unit', 'class' => 'form-control','min' => 0,'max' => 100000000]) !!}
  
</div>
<!-- End Price Per Unit Field -->

<!-- Start Max Units Per Investor Field -->
<div id="div-max_units_per_investor" class="form-group col-md-6 mb-4">
    <label for="max_units_per_investor">Max Units Per Investor</label>
        {!! Form::number('max_units_per_investor', null, ['id'=>'max_units_per_investor', 'class' => 'form-control','min' => 1,'max' => 1000000000]) !!}

</div>
<!-- End Max Units Per Investor Field -->

<!-- Start Interest Rate Pct Field -->
<div id="div-interest_rate_pct" class="form-group col-md-6 mb-4">
    <label for="interest_rate_pct">Interest Rate Pct</label>
        {!! Form::number('interest_rate_pct', null, ['id'=>'interest_rate_pct', 'class' => 'form-control','min' => 0,'max' => 100]) !!}
  
</div>
<!-- End Interest Rate Pct Field -->

<!-- Offer Start Date Field -->
<div id="div-offer_start_date" class="form-group col-md-6 mb-4">
    <label for="offer_start_date">Offer Start Date</label>
        {!! Form::date('offer_start_date', $offer->offer_start_date ?? date('d-m-Y'), ['id'=>'offer_start_date', 'class' => 'form-control']) !!}
    
</div>

<!-- Offer End Date Field -->
<div id="div-offer_end_date" class="form-group col-md-6 mb-4">
    <label for="offer_end_date">Offer End Date</label>
        {!! Form::date('offer_end_date', null, ['id'=>'offer_end_date', 'class' => 'form-control']) !!}
    
</div>

<!-- Offer Settlement Date Field -->
<div id="div-offer_settlement_date" class="form-group col-md-6 mb-4">
    <label for="offer_settlement_date">Offer Settlement Date</label>
        {!! Form::date('offer_settlement_date', null, ['id'=>'offer_settlement_date', 'class' => 'form-control']) !!}
   
</div>

<!-- Offer Maturity Date Field -->
<div id="div-offer_maturity_date" class="form-group col-md-6 mb-4">
    <label for="offer_maturity_date">Offer Maturity Date</label>
        {!! Form::date('offer_maturity_date', null, ['id'=>'offer_maturity_date', 'class' => 'form-control']) !!}
  
</div>

<!-- Tenor Years Field -->
<div id="div-tenor_years" class="form-group col-md-6 mb-4">
    <label for="tenor_years">Tenor Years</label>
        {!! Form::number    ('tenor_years', null, ['id'=>'tenor_years', 'class' => 'form-control']) !!}
  
</div>
