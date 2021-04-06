<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|unique:products|min:3|max:255',
            'stock' => 'required|between:0,500',
            'price' => 'required|between:0,300.99',
            'weight' => 'nullable|between:0,99.99'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => "Esse nome já foicadastrado"
        ];
    }

}
