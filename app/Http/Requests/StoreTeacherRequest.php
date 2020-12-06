<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string'],
            'email' => ['email', 'unique:teachers', 'required'],
            'tsc_number' => ['required', 'numeric'],
            'union' => ['required'],
            'phone' => ['required', 'unique:teachers']
        ];
    }
}
