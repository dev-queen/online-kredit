<?php

namespace App\Http\Requests\Admin\SmsTemplate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'template' => 'required|string',
            'letter_name' => 'string|nullable',
            'active' => 'nullable',
            'event_type' => 'nullable',
            'links'=>'nullable',
            'time_from'=>'date_format:H:i|nullable',
            'time_to'=>'date_format:H:i|nullable',
            'delay_time'=>'integer|nullable',
            'check_time_zone' => 'nullable'

        ];
//if($this->request->get('links')){
//        foreach ($this->request->get('links') as $key => $val) {
//            $rules['links.' . $key . '.title'] = 'nullable|max:255';
//            $rules['links.' . $key . '.description'] = 'nullable|max:255';
//
//        }
//}
        return $rules;
    }
}
