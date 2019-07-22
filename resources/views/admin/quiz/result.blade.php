@extends('admin.app')
@section('main-app')
@include('admin.panel_header')
<div class="panel card">
    <div class="your_score">
            <br><br><br><br>
            <center>
                <h3 style="font-size: 30px" class="{{ $label }}">Your Score</h3>
                <h1 style="font-size: 80px" class="{{ $label }}">{{ $score }}</h1>
                <br>
                <a href="{{ url('/quiz') }}" class="btn-default" id="btnSave"><i class="fas fa-send"></i> Try Again</a>
            </center>
        <br><br><br>
    </div>
    
</div>
@endsection
