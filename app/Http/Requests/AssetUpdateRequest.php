<?php

namespace App\Http\Requests;


class AssetUpdateRequest extends CoreRequest
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
            'name' => 'required',
            'serial_number' => 'required|unique:assets,id,'.$this->get('id'),
            'asset_value' => 'required|numeric'

        ];
    }
}
