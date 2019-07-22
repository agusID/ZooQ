@extends('admin.app')
@section('main-app')
@include('admin.panel_header')
<div class="panel card">
<form method="post" action="{{ url('course/update/'.$courses->course_id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-field">
        <div class="form-group">
                <label class="form-label">Course Code<sup class="sup-required">*</sup></label>
                <input type="text" value="{{ $courses->course_code }}" id="course_code" class="form-input {{ $errors->has('course_code') ? 'has-error' :'' }}" name="course_code" placeholder="" autocomplete="off" />
                <p class="note">Maximum input 10 characters, doesn't contain special characters and spaces.</p>
                <div class="error-message" id="CourseCodeErrorMessage"></div>    
            </div>
            <div class="form-group">
                <label class="form-label">Course Name<sup class="sup-required">*</sup></label>
                <input type="text" value="{{ $courses->course_name }}" id="course_name" class="form-input {{ $errors->has('course_name') ? 'has-error' :'' }}" name="course_name" placeholder="" autocomplete="off" />
                <p class="note">Maximum input 150 characters, doesn't contain special characters.</p>
                <div class="error-message" id="CourseNameErrorMessage"></div>    
            </div>   
            <div class="form-group">
                <label class="form-label">Desciption<sup class="sup-required">*</sup></label>
                <textarea name="description" id="description" class="form-input-area">{{ $courses->description }}</textarea></td>
            </div>        
            <div class="form-group">
                <div class="btn-group">
                    @if ($errors->any())
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit" name="btnUpdate" class="btn-action" id="btnUpdate"><i class="fas fa-pencil-alt"></i> Update Data</button>
                    <a href="{{ url('course') }}" class="btn-default">Cancel</a>
                    <div id="box-loader">
                        <div id="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
$('#course_code, #description, #course_name').keyup(function(){
    if( $('#btnUpdate').hasClass('btn-disabled') && 
        $('#course_code').val() != "" &&
        $('#description').val() != "" &&
        $('#course_name').val() != ""
        )
    {
        $('#btnbtnUpdateSave').removeClass('btn-disabled');
    }else if(
        $('#course_code').val() == "" ||
        $('#description').val() == "" ||
        $('#course_name').val() == ""
    ){
        $('#btnUpdate').addClass('btn-disabled');
    }
});
</script>
</div>
@endsection
