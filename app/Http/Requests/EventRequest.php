<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "title" => 'required',
            "description" => 'required',
            "datetime" => 'required',
            "quota" => 'required',
            "price" => 'required',
            "location" => 'required',
            "image" => 'image|mimes:jpeg,jpg,png|size:1024',
        ];
    }
}
