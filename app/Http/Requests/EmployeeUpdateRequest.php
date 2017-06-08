<?php

namespace App\Http\Requests;

class EmployeeUpdateRequest extends CoreRequest
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
            //
            'email' => 'required|unique:users,id,'.$this->get('id'),
            'name'  => 'required',
            'designation'  => 'required',
            'contact_number' => 'regex:/[0-9]{10}/|unique:users,id'.$this->get('id')
        ];
    }
}
