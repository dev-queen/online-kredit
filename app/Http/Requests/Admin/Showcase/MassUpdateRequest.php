<?php

namespace App\Http\Requests\Admin\Showcase;

use Illuminate\Foundation\Http\FormRequest;

class MassUpdateRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'sort' => 'integer|nullable'
        ];
        foreach ($this->request->get('name') as $key => $val) {
            $rules['name.' . $key . '.title'] = 'required|max:255';
            $rules['name.' . $key . '.description'] = 'required|max:255';

        }
        return $rules;
    }
}
