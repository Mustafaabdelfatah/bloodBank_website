<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GovernorateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }

    public function messages()
    {

        return [
            'governorate_name_en'              => trans('site.governorate_name_en'),
        ];
    }
}
