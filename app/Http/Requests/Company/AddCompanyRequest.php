<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class AddCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->file('image')) {
            $file = $this->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension; 
            // $file->move(public_path('upload_img/category/'),$filename);
        } else {
            $filename = null;
        }
        return [
            'name'          => $this->input('name'),
            'email'          => $this->input('email'), 
            'image'         => $filename,
            'website'   => $this->input('website'),
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
            'name' => 'required|max:800|unique:comapnies',
            'email' => 'required|unique:comapnies',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:100000' // max 10000kb
        ];
    }
}
