@extends('layouts.app')
@section('main-app')
        <section id="slideshow-content">
            <div class="owl-carousel owl-theme" id="SlideShow">
                @foreach($slideshows as $slideshow)
                <div>
                    <img src="{{ URL::asset('assets/images/slideshow/'.$slideshow->image) }}"/>
                    <div class="container">
                        <div class="caption">
                            <h1 class="gallery-title">{{$slideshow->title}}</h1>
                            <p class="gallery-description">
                                {{$slideshow->description}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </section>
        <section id="about-content" class="content">
            <div class="container">
                <h2 class="title">Introduction<div id="DataSlide"></div></h2>
                <p>
                    {{ $zooq[0]['about'] }}
                </p>
            </div>
        </section>
        @include('gallery.gallery')


@endsection