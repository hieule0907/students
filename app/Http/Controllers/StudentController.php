<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use App\Classes;
use Session;
use App\Http\Requests\FormRequest;
use Redirect;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Standardize a name
     * Uppercase first letter of word
     * @return string
     */
    function standardizedName($name) {
        $array  = explode(" ", $name);
 
        foreach($array as $key => $value){
            if(trim($value) == null) unset($array[$key]);
        }
         
        $name = implode(" ", $array);
        $name = strtolower($name);
        $name = ucwords($name);
        
        return $name;
    }

    function trimSpace($array)
    {
        foreach ($array as $key => $value) {
            $array[$key] = trim($value);
        }
        return $array;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::getStudentList();

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::getClassList();

        return view('student.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {

        $input = $request->all();
        
        $input = self::trimSpace($input);
        $input['studentName'] = self::standardizedName($input['studentName']);

        $student = Student::addStudent($input);

        Session::flash('create_success', '');

        return redirect()->route('student.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return redirect()->route('student.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findStudent($id);

        if (empty($student)) {

            return redirect()->route('student.index');

        }

        $classes = Classes::getClassList();

        return view('student.edit', ['student' => $student, 'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest $request, $id)
    {

        $input = $request->all();

        $input = self::trimSpace($input);

        $input['studentName'] = self::standardizedName($input['studentName']);

        $student = Student::editStudent($id, $input);

        Session::flash('success', '');

        return redirect()->route('student.edit', ['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student = Student::destroy($id);

    }
}
