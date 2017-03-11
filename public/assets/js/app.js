$(document).ready(function() {

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

    $('.input-group').datepicker({
        format: "dd-mm-yyyy",
    });

    $('#edit-form').validate({
        rules:{
            studentName:{
                required: true
            },
            studentId:{
                required: true
            },
            studentEmail:{
                required: true,
                email: true
            },
            studentPhone:{
                required: true,
                digits: true,
            }
        },
        messages:{
            studentName:{
                required: 'Họ tên không được để trống'
            },
            studentId:{
                required: 'Mã SV không được để trống'
            },
            studentEmail:{
                required: 'Email không được để trống',
                email: 'Không đúng định dạng email'
            },
            studentPhone:{
                required: 'SĐT không đưọc để trống',
                digits: 'Chỉ được bao gồm số',
            }
        }
    });

    $('#create-form').validate({
        rules:{
            studentName:{
                required: true
            },
            studentId:{
                required: true
            },
            studentEmail:{
                required: true,
                email: true
            },
            studentPhone:{
                required: true,
                digits: true,
            }
        },
        messages:{
            studentName:{
                required: 'Họ tên không được để trống'
            },
            studentId:{
                required: 'Mã SV không được để trống'
            },
            studentEmail:{
                required: 'Email không được để trống',
                email: 'Không đúng định dạng email'
            },
            studentPhone:{
                required: 'SĐT không đưọc để trống',
                digits: 'Chỉ được bao gồm số',
            }
        }
    });

    $('#delete-all').on('click', function(e) {
        if($(this).is(':checked',true))  
        {
            $(".sub_chk").prop('checked', true);  
        }  
        else  
        {  
            $(".sub_chk").prop('checked',false);  
        }  
    });
});