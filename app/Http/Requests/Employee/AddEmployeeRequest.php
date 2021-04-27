<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return [
            'firstname'  => $this->input('firstname'),
            'lastname'   => $this->input('lastname'),
            'email'   => $this->input('email'),
            'company'   => $this->input('company'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|max:800',
            'email' => 'required|unique:employees',
        ];
    }
}
