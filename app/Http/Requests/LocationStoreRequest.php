<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
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
            'domain' => ['string','required'],
            'name' => ['string', 'required'],
            'address1' => ['string', 'required'],
            'address2' => ['nullable'],
            'city' => ['string', 'required'],
            'state' => ['string', 'required'],
            'zip' => ['string', 'required'],
            
        ];
    }
}
