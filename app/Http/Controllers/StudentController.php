<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use App\Classes;
use Session;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('class')->get();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::get();
        return view('student.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'studentName' => 'required',
            'studentId' => 'required',
            'studentEmail' => 'required|email',
            'studentClass' => 'required',
            'studentGender' => 'required',
            'studentPhone' => 'required|numeric',
            'studentBirthday' => 'required|date'
        ]);

        $student = new Student;

        $student->name = $request->input('studentName');
        $student->student_id = $request->input('studentId');
        $student->email = $request->input('studentEmail');
        $student->class_id = $request->input('studentClass');
        $student->gender = $request->input('studentGender');
        $student->phone = $request->input('studentPhone');
        $student->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('studentBirthday'))));

        try {
            $student->save();
        } catch (\Exception $e) {
            flash($e->getMessage(), 'danger');
            return redirect()->to($this->getRedirectUrl())->withInput($request->input());
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::with('class')->find($id);
        $classes = Classes::get();
        return view('student.edit', ['student' => $student, 'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'studentName' => 'required',
            'studentId' => 'required',
            'studentEmail' => 'required|email',
            'studentClass' => 'required',
            'studentGender' => 'required',
            'studentPhone' => 'required|numeric',
            'studentBirthday' => 'required|date'
        ]);

        $student = Student::find($id);
        $classes = Classes::get();

        $student->name = $request->input('studentName');
        $student->student_id = $request->input('studentId');
        $student->email = $request->input('studentEmail');
        $student->class_id = $request->input('studentClass');
        $student->gender = $request->input('studentGender');
        $student->phone = $request->input('studentPhone');
        $student->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('studentBirthday'))));

        try {
            $student->save();
        } catch (\Exception $e) {
            flash($e->getMessage(), 'danger');
            return redirect()->to($this->getRedirectUrl());
        }

        Session::flash('success', '');
        return view('student.edit', ['student' => $student, 'classes' => $classes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', $id)->delete();
    }
}
