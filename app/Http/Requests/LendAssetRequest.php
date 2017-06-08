<?php

namespace App\Http\Requests;



class LendAssetRequest extends CoreRequest
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
            'date_given' => 'required',
            'employee_id' => 'required',
            'notes' => 'required',
        ];
    }
}
