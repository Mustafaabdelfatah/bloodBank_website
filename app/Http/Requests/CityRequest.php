<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name.required' => 'الاسم مطلوب',
            'governorate_id.required' => 'المحافظة مطلوبة ',

        ];
    }
}
