@extends('admin.app')
@section('main-app')
@include('admin.panel_header')
<div class="panel card">
<form method="post" action="{{ url('gallery/slideshow/update/'.$slideshows->slideshow_id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label">Title<sup class="sup-required">*</sup></label>
        <input type="text" value="{{ $slideshows->title }}" id="title" value="" class="form-input {{ $errors->has('title') ? 'has-error' :'' }}" name="title" placeholder="" autocomplete="off" />
        <div class="error-message" id="TitleErrorMessage"></div>    
    </div>
    <div class="form-group">
            <label class="form-label">Desciption<sup class="sup-required">*</sup></label>
            <textarea name="description" id="description" class="form-input-area">{{ $slideshows->description }}</textarea></td>
        </div>
    <div class="form-group">
        <label class="form-label">Upload Image</label>
        <div class="upload-group">  
            <label class="filename">Choose Image</label>
            <div class="btn btn-upload browse-button">
                <span class="browse-button-text">
                <i class="fa fa-folder-open"></i> Browse...</span>
                <input type="file" name="file_upload" accept="image/jpeg, image/x-png"/>
            </div>
        </div>
        <p class="note">Only PNG, JPG &amp; JPEG files are allowed.</p>
    </div>
    <div class="card-footer border-top">
        <div class="btn-group">
            @if ($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" name="btnUpdate" class="btn-action" id="btnUpdate"><i class="fas fa-pencil-alt"></i> Update Data</button>
            <a href="{{ url('gallery/slideshow') }}" class="btn-default">Cancel</a>
            <div id="box-loader">
                <div id="loader"></div>
            </div>
        </div>
    </div>
</form>

<script>
   $('#title, #description').keyup(function(){
        if( $('#btnUpdate').hasClass('btn-disabled') && 
            $('#title').val() != "" &&
            $('#description').val() != ""
            )
        {
            $('#btnUpdate').removeClass('btn-disabled');
        }else if(
            $('#title').val() == "" ||
            $('#description').val() == ""
        ){
            $('#btnUpdate').addClass('btn-disabled');
        }
    });
</script>
</div>
@endsection
