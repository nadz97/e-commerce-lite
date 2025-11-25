<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'sometimes|string|max:255',
            'price'       => 'sometimes|numeric|min:0',
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }
}
