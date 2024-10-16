<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' =>'required|max:20',
            'description' => 'max:50',
            'price' => 'required',
            'quantity' =>'required',
            'category_id' => 'required|numeric',
        ];

        if($this->route()->getActionMethod() == "store"){
            $rules['image'] = 'image|required';
        }
        return $rules;
    }
}
