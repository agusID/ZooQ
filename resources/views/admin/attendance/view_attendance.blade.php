@include('admin.panel_header')
<?php
use Carbon\Carbon;
?>
<div class="panel card">
    <form method="post" action="{{ url('attendance/store') }}">
        @csrf
        <div class="card-footer border-top">
            @if (Auth::user()->roles->role_name == 'administrator')
            <div class="btn-group">
                <a href="{{ url('attendance/view_manage_attendance') }}" class="btn-default item-nav-manage"><i class="fas fa-cog"></i> Manage Attendance</a>
                
                <div id="box-loader">
                    <div id="loader"></div>
                </div>
            </div>
            @endif
        </div><br>
        <div class="form-field flex-group">

            <div class="form-group column-50">
                <label class="form-label">Student Class<sup class="sup-required">*</sup></label>
                <select name="cmbStudentClass" id="cmbStudentClass" class="form-select {{ $errors->has('cmbStudentClass') ? 'has-error' :'' }}">
                    <option value="" disabled selected>Choose Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->class_id }}">{{ $class->class_label }}</option>
                    @endforeach
                </select> 
                <div class="error-message" id="StudentClassErrorMessage"></div>    
            </div>
            <div class="form-group column-50">
                <label class="form-label">Attendance Date</label>
                @php
                $date = date_create(Carbon::now());
                @endphp
                <input type="date" max="{{ date_format($date,"Y-m-d") }}" value="{{ date_format($date,"Y-m-d") }}" id="attendance_date" class="form-input {{ $errors->has('attendance_date') ? 'has-error' :'' }}" name="attendance_date" placeholder="" autocomplete="off" />
                <div class="error-message" id="AttendanceDateErrorMessage"></div>    
            </div>  
            <div id="BoxLoader"></div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th width='100px'>Status</th>
                </tr>
            </thead>
            <tbody id="list">
                <tr>
                    <td colspan="4">Select the class first.</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="card-footer border-top">
            <div class="btn-group">
                <button type="submit" name="btnUpdate" class="btn-action btn-disabled" id="btnVerify"><i class="fas fa-check"></i> Verify Attendance</button>
                <div id="box-loader">
                    <div id="loader"></div>
                </div>
            </div>
        </div>
    </form>


</div>
<script>
    $('.item-nav-manage').click(function(event) {
        event.preventDefault(); // Avoid the link click from loading a new page
        var link = $(this).attr('href');
        var link_replaced = $(this).attr('href').replace("view_", "");
        window.history.pushState("", "", link_replaced);
        // Load the content from the link's href attribute
        $('.loading').fadeIn();
        $(document).unbind( "ajax" );
        $.ajax({
            type: "GET",
            url: link,
            contentType: false,
            success: function(data) {
                $(".content").hide().html(data).fadeIn();
                $('.loading').fadeOut();
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });

    $(".navDeleteLink").click(function(e){
        e.preventDefault();
        console.log(this);
        $('#ModalDelete').css({'display':'block'});
        $('#ModalDelete').show().addClass('fadeInDown');
        $('#ModalDelete #delete-form').attr("action", $(this).attr('href'));
        $('#ModalDelete .ModalLabel').html($(this).attr('data-title'));
        $('#ModalDelete .modal-body').html($(this).attr('data-msg'));
        $('#backdrop').html('<div class="modal-backdrop"></div>');
    });

    $("#ModalDelete .close, #ModalDelete .btn-cancel").click(function(){
        $('#ModalDelete').fadeOut();
        $('#ModalDelete .btn-ok').attr("href", $(this).attr('href'));
        $('.modal-backdrop').fadeOut(); 
        $('#backdrop').html('');
    });
    $('select#cmbStudentClass').change(function(){
        $('#BoxLoader').html('<div id="getting_data"><div id="loader"></div></div>');
        $('#list').html('');
       $.getJSON("attendance/getStudentData/"+$('select#cmbStudentClass').val(), function(student) {
        //    console.log(student);
            var jml_data = student.data.length;
            // console.log(jml_data);
            if(jml_data == 0){
                $('#list').append("<tr><td colspan='4'>No data available.</td></tr>");
            }else{
                for(var i = 0; i < jml_data; i++){
                    $('#list').append(
                    "<tr>"+
                        "<td>"+student.data[i].name+"</td><td>"+student.data[i].classes.class_label+"</td>"+
                        "<td>"+
                            "<input type='hidden' name='studentCheckbox[]' value='"+student.data[i].student_id+"'/>"+
                            "<div class='rdb-group'>"+
                                "<div class='custom-control custom-radio'>"+
                                    "<input checked class='custom-control-input' type='radio' name='status"+student.data[i].student_id+"' id='present_"+i+"' value='1'/><label class='custom-control-label' for='present_"+i+"'>Present</label>"+
                                "</div>"+
                                "<div class='custom-control custom-radio'>"+
                                    "<input class='custom-control-input' type='radio' name='status"+student.data[i].student_id+"' id='late_"+i+"' value='2'/><label class='custom-control-label' for='late_"+i+"'>Late</label>"+
                                "</div>"+
                                "<div class='custom-control custom-radio'>"+
                                    "<input class='custom-control-input' type='radio' name='status"+student.data[i].student_id+"' id='permission_"+i+"' value='3'/><label class='custom-control-label' for='permission_"+i+"'>Permission</label>"+
                                "</div>"+
                                "<div class='custom-control custom-radio'>"+
                                    "<input class='custom-control-input' type='radio' name='status"+student.data[i].student_id+"' id='absent_"+i+"' value='4'/><label class='custom-control-label' for='absent_"+i+"'>Absent</label>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                    "</tr>"
                    );
                    // $('#list').find("tr:last").slideDown("slow");
                }
                $('#list').hide().fadeIn(1000);
                if($('#btnVerify').hasClass('btn-disabled')){
                    $('#btnVerify').removeClass('btn-disabled');
                }
            }
            $('#getting_data').slideUp('slow');
            $('#BoxLoader').html('');
            
        });


    });
</script>
