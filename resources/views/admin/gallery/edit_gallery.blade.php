@extends('admin.app')
@section('main-app')
@include('admin.panel_header')
<div class="panel card">
    <form method="post" action="{{ url('gallery/gallery/update/'.$galleries->gallery_id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-field">
            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" value="{{ $galleries->title }}" id="title" class="form-input {{ $errors->has('title') ? 'has-error' :'' }}" name="title" placeholder="" autocomplete="off" />
                <div class="error-message" id="TitleErrorMessage"></div>    
            </div>
            <div class="form-group">
                <label class="form-label">Desciption</label>
                <textarea name="description" class="form-input-area">{{ $galleries->description }}</textarea></td>
            </div>
            <div class="form-group">
                <label class="form-label">Upload Image</label>
                <div class="upload-group">
                    <input type="file" name="file_upload" accept="image/jpeg, image/x-png" class="file-upload" />
                </div>
                <p class="note">Only PNG, JPG &amp; JPEG files are allowed.</p>
            </div>
            <div class="form-group">
                <div class="btn-group">
                    @if ($errors->any())
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit" name="btnUpdate" class="btn-action" id="btnRegister"><i class="fas fa-pencil-alt"></i> Update Data</button>
                    <a href="{{ url('gallery/gallery') }}" class="btn-default">Cancel</a>
                    <div id="box-loader">
                        <div id="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
