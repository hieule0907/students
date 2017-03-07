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
                                <th>MSSV</th>
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
                            <tr id="student{{ $student->id }}">
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->class->name }}</td>
                                <td>{{ ($student->gender == 1) ? 'Nam' : 'Nữ' }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ date('d-m-Y', strtotime($student->birthday)) }}</td>
                                <td>
                                    <a href="student/{{ $student->id }}/edit"><button class="btn btn-sm btn-primary"> Edit </button></a> | 
                                    <button class="btn btn-sm btn-danger delete-student" value="{{ $student->id }}"> Delete </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-right">
                <a href="/student/create"><button class="btn btn-default btn-md">Thêm sinh viên</button></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#students-list').DataTable();

    });

    $(document).on('click','.delete-student',function() {
        if (confirm("Are you sure?")) {

            var student_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: "DELETE",
                url: '/student/' + student_id,
                success: function (data) {
                    console.log(data);
                    $("#student" + student_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
        return false;
    })
    
</script>

@endsection
