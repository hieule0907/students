@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sua thong tin sinh vien</div>

                <div class="panel-body">
                    <form method="POST" action="/student/{{ $student->id }}">
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control" name="studentName" value="{{ $student->name }}">
                        </div>
                        <div class="form-group">
                            <label for="studentEmail">Email</label>
                            <input type="email" class="form-control" name="studentEmail" value="{{ $student->email }}">
                        </div>
                        <div class="form-group">
                            <label for="studentClass">Class</label>
                            <input type="text" class="form-control" name="studentClass" value="{{ $student->class }}">
                        </div>
                        <div class="form-group">
                            <label for="studentGender">Gender</label>
                            <select class="form-control" name="studentGender">
                                <option value="" {{ ($student->gender == 1) ? 'selected' : '' }}>Nam</option>
                                <option value="" {{ ($student->gender == 0) ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="studentPhone">Phone</label>
                            <input type="text" class="form-control" name="studentPhone" value="{{ $student->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="studentBirthday">Birthday</label>
                            <input type="text" class="form-control" name="studentBirthday" value="{{ date('d-m-Y', strtotime($student->birthday)) }}">
                        </div>
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">

                        <div class="text-center"><button type="submit" class="btn btn-primary">Done</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
