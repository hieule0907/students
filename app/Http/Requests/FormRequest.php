<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormRequest extends Request
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
            'studentName' => 'required',
            'studentId' => 'required',
            'studentEmail' => 'required|email',
            'studentClass' => 'required',
            'studentGender' => 'required',
            'studentPhone' => 'required|numeric',
            'studentBirthday' => 'required|date'
        ];
    }
}
