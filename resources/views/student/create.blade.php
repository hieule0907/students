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
                @if(Session::has("create_success"))
                    <script>
                        window.alert('Add student successfully');
                    </script>
                @endif
                <div class="panel-heading">Add a new Student</div>

                <div class="panel-body">
                    <form method="POST" action="/student">
                        <div class="form-group">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control" name="studentName" value="{{ old('studentName') }}">
                        </div>
                        <div class="form-group">
                            <label for="studentId">Student ID Number</label>
                            <input type="text" class="form-control" name="studentId" value="{{ old('studentId') }}">
                        </div>
                        <div class="form-group">
                            <label for="studentEmail">Email</label>
                            <input type="email" class="form-control" name="studentEmail" value="{{ old('studentEmail') }}">
                        </div>
                        <div class="form-group">
                            <label for="studentClass">Class</label>
                            <select class="form-control" name="studentClass">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ ($class->id == old('studentClass')) ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studentGender">Gender</label>
                            <select class="form-control" name="studentGender">
                                <option value="1" {{ (old('studentGender') == 1) ? 'selected' : '' }}>Nam</option>
                                <option value="0" {{ (old('studentGender') == 0) ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studentPhone">Phone</label>
                            <input type="text" class="form-control" name="studentPhone" value="{{ old('studentPhone') }}">
                        </div>
                        <div class="form-group">
                            <label for="studentBirthday">Birthday</label>
                            <input type="text" class="form-control" name="studentBirthday" value="{{ date('d-m-Y', strtotime(old('studentBirthday'))) }}">
                        </div>
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">

                        <div class="text-center"><button type="submit" class="btn btn-primary">Create</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
