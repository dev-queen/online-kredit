<?php

namespace App\Http\Requests\Admin\Offer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'name' => 'required|string',
            'url' => 'required|string',
            'logo' => 'file|nullable',
            'sum' => 'integer|nullable',
            'age' => 'integer|nullable',
            'sort' => 'integer|nullable',
            'dice_text' => 'string|nullable',
            'text_button' => 'string|nullable',
            'quality' => 'string|nullable',
            'display' => 'nullable',
            'rating' => 'numeric|nullable|min:0|max:5',
            'id_showcase' => 'integer|nullable|exists:show_cases,id'
        ];
    }
}
