@extends('layouts.app')
@section('main-app')
    
<section id="GalleryView" class="content">
    <div class="container">
        
        <div class="gallery-detail">
            <h2 class="title">{{ $galleries->title }}</h2>
            <div class="time-upload"><span class="far fa-clock"></span> {{ $galleries->created_at->format('l, d M Y') }}</div>
            <img src="{{ URL::asset('assets/images/gallery/'.$galleries->image) }}" />
            <p class="image-description">{{ $galleries->description }}</p>
        </div>
    </div>
</section>


@endsection