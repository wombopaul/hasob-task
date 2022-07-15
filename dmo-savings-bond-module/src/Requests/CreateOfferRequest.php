<?php

namespace DMO\SavingsBond\Requests;

use DMO\SavingsBond\Requests\AppBaseFormRequest;
use DMO\SavingsBond\Models\Offer;

class CreateOfferRequest extends AppBaseFormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'organization_id' => 'required',
        'display_ordinal' => 'nullable|min:0|max:365',
        'wf_status' => 'max:100',
        'wf_meta_data' => 'max:1000',
        'offer_title' => 'required|email',
        'price_per_unit' => 'required|min:0|max:100000000',
        'max_units_per_investor' => 'required|min:1|max:1000000000',
        'interest_rate_pct' => 'required|min:0|max:100',
        'offer_start_date' => 'required',
        'offer_end_date' => 'required',
        'offer_settlement_date' => 'required',
        'offer_maturity_date' => 'required'
        ];
    }
}
