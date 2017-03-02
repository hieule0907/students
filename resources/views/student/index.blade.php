@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Students List</div>

                <div class="panel-body">
                    <table id="students-list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tên SV</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th>Giới tính</th>
                                <th>SĐT</th>
                                <th>Ngày sinh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ ($student->gender == 1) ? 'Nam' : 'Nữ' }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ date('d-m-Y', strtotime($student->birthday)) }}</td>
                                <td><a href="student/{{ $student->id }}/edit"> Edit </a> | Delete</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-default btn-md">Thêm sinh viên</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#students-list').DataTable();
    });
</script>

@endsection
