<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'min:4|max:191|string|required',
            'vision' => 'max:65000|string|nullable',
            'mision' => 'max:65000|string|nullable',
            'description' => 'max:65000|string|nullable',
            'youtube' => 'max:50|string|nullable',
            'photo' => 'file|image|mimes:jpeg,jpg,png|max:4096|nullable',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
