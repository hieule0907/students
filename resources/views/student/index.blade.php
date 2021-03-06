@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Students List</div>

                <div class="panel-body">
                    <table id="students-list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tên SV</th>
                                <th>MSSV</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th>Giới tính</th>
                                <th>SĐT</th>
                                <th>Ngày sinh</th>
                                <th>Action</th>
                                <th><input type="checkbox" id="delete-all"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr id="student{{ $student->id }}" student-row-id="{{ $student->id }}">
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->class->name }}</td>
                                <td>{{ ($student->gender == 1) ? 'Nam' : 'Nữ' }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ date('d-m-Y', strtotime($student->birthday)) }}</td>
                                <td>
                                    <a href="student/{{ $student->id }}/edit">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-sm btn-danger delete-student" value="{{ $student->id }}"> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                                <td><input type="checkbox" class="sub_chk" student-id="{{ $student->id }}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <div class="text-right">
                            <button class="btn btn-danger btn-md delete-selected">Xóa nhiều</button>
                            </div>
                        </tfoot>
                    </table>

                    {{ $students->links() }}
                </div>
            </div>

            <div class="text-right">
                <a href="/student/create"><button class="btn btn-default btn-md">Thêm sinh viên</button></a>
            </div>
        </div>
    </div>
</div>

@endsection
