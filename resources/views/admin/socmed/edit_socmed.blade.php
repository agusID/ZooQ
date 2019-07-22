@extends('admin.app')
@section('main-app')
@include('admin.panel_header')
<div class="panel card">
<form method="post" action="{{ url('socmed/update_link/'.$socmeds->media_social_id) }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Link</label>
        <input type="text" value="{{ $socmeds->link }}" id="link" class="form-input {{ $errors->has('link') ? 'has-error' :'' }}" name="link" placeholder="" autocomplete="off" />
        <div class="error-message" id="LinkErrorMessage"></div>    
    </div>
    <div class="card-footer border-top">
        <div class="btn-group">
            <button type="submit" name="btnUpdate" class="btn-action" id="btnRegister"><i class="fas fa-pencil-alt"></i> Update Link</button>
            <a href="{{ url('socmed/socmed') }}" class="btn-default">Cancel</a>
            <div id="box-loader">
                <div id="loader"></div>
            </div>
        </div>
    </div>
</form>


</div>
@endsection
