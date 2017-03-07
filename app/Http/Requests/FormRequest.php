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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'studentName.required' => 'Tên sinh viên không được để trống',
            'studentId.required'  => 'Mã SV không được để trống',
            'studentEmail.required' => 'Email không được để trống',
            'studentEmail.email' => 'Email không hợp lệ',
            'studentClass.required' => 'Hãy chọn lớp',
            'studentGender.required' => 'Hãy chọn giới tính',
            'studentPhone.required' => 'SĐT không được để trống',
            'studentPhone.numeric' => 'SĐT không hợp lệ',
            'studentBirthday.required' => 'Ngày sinh không được để trống',
            'studentBirthday.date' => 'Ngày sinh không hợp lệ'
        ];
}


}
