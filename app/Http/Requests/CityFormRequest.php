<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityFormRequest extends FormRequest
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
            "cityname"=>"required",
            "ostan_id"=>"required | integer | gt :0"
        ];
    }


    public function messages()
    {
        return [
            "cityname.required"=>"وارئ کردن نام شهر الزامی است",
            "ostan_id.gt"=>"انتخاب نام استان ضروری است",
            "ostan_id.integer"=>"پارامتر وارئ شده برای استان اشتباه است"

        ];
    }
}
