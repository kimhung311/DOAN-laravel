<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required', // rule: not null, minumum: 5, maximum: 255
            'image' => 'required',
            'price' => 'required',
            'status' => 'required',
            'category_id' => 'required', // rule: not null
        ];
    }
}
