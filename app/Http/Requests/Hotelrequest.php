<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Hotelrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'integer',
            'images.*' => [
                'required',
                'image',
                'mimetypes:image/jpeg,image/jpg,image/png,image/gif',
            ],
            // 'images.*' => [
            //     'required',
            //     'image',
            //     'mimetypes:image/jpeg,image/jpg,image/png,image/gif,'
            // ],
            'name' => "required|string|min:3",
            'city_id' => "required|int|exists:cities,id",

            'phone' => [
                'required',
                "unique:hotels,phone,$this->id",
                'regex:/^\+?\d{1,4}?\s?\(?\d{1,4}?\)?[-.\s]?\d{1,12}$/'
            ],
        ];
    }
}
