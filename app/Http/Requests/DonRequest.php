<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'patient_name'=>'required',
            'name'=>'required',
            'name'=>'required',
            'name'=>'required',
            'name'=>'required',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'الاسم مطلوب',
            'governorate_id.required' => 'المحافظة مطلوبة ',
            'name.required' => 'الاسم مطلوب',
            'governorate_id.required' => 'المحافظة مطلوبة ',
            'name.required' => 'الاسم مطلوب',
            'governorate_id.required' => 'المحافظة مطلوبة ',7

        ];
    }
}
