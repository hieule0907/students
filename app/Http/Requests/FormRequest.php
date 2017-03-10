<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Student;

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

        switch($this->method()) {
            case 'GET':

            case 'DELETE':
            {
                return [];
            }

            case 'POST': 
            {
                return [
                    'studentName' => 'required|
                                    regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$/',
                    'studentId' => 'required|regex:/(^[A-Za-z0-9]+$)+/|unique:students,student_id',
                    'studentEmail' => 'required|email|unique:students,email',
                    'studentClass' => 'required',
                    'studentGender' => 'required',
                    'studentPhone' => 'required|numeric|digits_between:10,11',
                    'studentBirthday' => 'required|date_format:d-m-Y|size:10'
                ];
            }

            case 'PATCH':

            case 'PUT':
            {
                return [
                    'studentName' => 'required|
                                    regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$/',
                    'studentId' => 'required|
                                    regex:/(^[A-Za-z0-9]+$)+/|
                                    unique:students,student_id,'.$this->get('id'),
                    'studentEmail' => 'required|email|unique:students,email,'.$this->get('id'),
                    'studentClass' => 'required',
                    'studentGender' => 'required',
                    'studentPhone' => 'required|numeric|digits_between:10,11',
                    'studentBirthday' => 'required|date_format:d-m-Y|size:10'
                ];
            }
            
            default: break;
        }
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
            'studentName.regex' => 'Tên sinh viên không hợp lệ',
            'studentId.required'  => 'Mã SV không được để trống',
            'studentId.regex' => 'Mã SV chỉ được bao gồm chữ và số',
            'studentId.unique' => 'Mã SV đã tồn tại',
            'studentEmail.required' => 'Email không được để trống',
            'studentEmail.email' => 'Email không hợp lệ',
            'studentEmail.unique' => 'Email đã tồn tại',   
            'studentClass.required' => 'Hãy chọn lớp',
            'studentGender.required' => 'Hãy chọn giới tính',
            'studentPhone.required' => 'SĐT không được để trống',
            'studentPhone.numeric' => 'SĐT không hợp lệ',
            'studentPhone.digits_between' => 'SĐT chỉ được gồm 10-11 số',
            'studentBirthday.required' => 'Ngày sinh không được để trống',
            'studentBirthday.date_format' => 'Ngày sinh không hợp lệ',
            'studentBirthday.size' => 'Ngày sinh không hợp lệ'
        ];
    }


}
