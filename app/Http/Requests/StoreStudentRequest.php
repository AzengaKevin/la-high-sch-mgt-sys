<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => ['required', 'string'], 
            'admission_number' => ['required'], 
            'stream_id' => ['numeric', 'required'], 
            'kcpe_marks' => ['required', 'numeric', 'between:250,500'], 
            'kcpe_grade' => ['required', 'max:2'], 
            'dob' => ['required', 'date'], 
            'join_level_id' => ['required', 'numeric']
        ];
    }

    public function attributes()
    {
        return [
            'stream_id' => 'stream',
            'join_level_id' => 'level',
            'dob' => 'date of birth'
        ];

    }
}
