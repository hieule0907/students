<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{	
	protected $table = "students";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'class', 'gender', 'phone', 'birthday', 'student_id', 'class_id'
    ];

    public function class() {
    	return $this->belongsTo('App\Classes', 'class_id');
    }

    public static function getStudentList() {
        return self::get();
    }

    public static function findStudent($id) {
        return self::find($id);
    }

    public static function addStudent($input) {
        $student = new Student;

        $student->name = $input['studentName'];
        $student->student_id = $input['studentId'];
        $student->email = $input['studentEmail'];
        $student->class_id = $input['studentClass'];
        $student->gender = $input['studentGender'];
        $student->phone = $input['studentPhone'];
        $student->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $input['studentBirthday'])));

        $student->save();

    }

    public static function editStudent($id, $input) {
        $student = self::find($id);

        $student->name = $input['studentName'];
        $student->student_id = $input['studentId'];
        $student->email = $input['studentEmail'];
        $student->class_id = $input['studentClass'];
        $student->gender = $input['studentGender'];
        $student->phone = $input['studentPhone'];
        $student->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $input['studentBirthday'])));

        $student->save();

        return $student;
    }
    
}
