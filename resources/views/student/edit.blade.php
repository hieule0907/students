@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has("success"))
                   <script>
                        window.alert('Edit successfully');
                   </script>
                @endif

                <div class="panel-heading">Sua thong tin sinh vien</div>

                <div class="panel-body">
                    <form method="POST" action="/student/{{ $student->id }}" id="edit-form">
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{ $student->id }}">
                        <div class="form-group">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control" name="studentName" value="{{ $student->name }}">
                        </div>
                        <div class="form-group">
                            <label for="studentId">Student ID Number</label>
                            <input type="text" class="form-control" name="studentId" value="{{ $student->student_id }}">
                        </div>
                        <div class="form-group">
                            <label for="studentEmail">Email</label>
                            <input type="email" class="form-control" name="studentEmail" value="{{ $student->email }}">
                        </div>
                        <div class="form-group">
                            <label for="studentClass">Class</label>
                            <select class="form-control" name="studentClass">
                                <option value="">- Chọn lớp học -</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ ($class->id == $student->class_id) ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studentGender">Gender</label>
                            <select class="form-control" name="studentGender">
                                <option value="">- Chọn giới tính -</option>
                                <option value="1" {{ ($student->gender == 1) ? 'selected' : '' }}>Nam</option>
                                <option value="0" {{ ($student->gender == 0) ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studentPhone">Phone</label>
                            <input type="text" class="form-control" name="studentPhone" value="{{ $student->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="studentBirthday">Birthday</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" name="studentBirthday" value="{{ date('d-m-Y', strtotime($student->birthday)) }}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
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
