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
}
