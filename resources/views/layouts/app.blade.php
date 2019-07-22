<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title }}</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $zooq[0]->keywords }}"/>
        <meta name="description" content="{{ $zooq[0]->description }}"/>
        
        <link rel="shorcut icon" href="{{ URL::asset('assets/images/web/'.$zooq[0]['favicon']) }}" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}">

        <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/owl.carousel.js') }}"></script>
        <script src="{{ URL::asset('assets/js/zooq.js') }}"></script>
        @if( $zooq[0]->text_color == true)
        <style>
            .navigation ul li .link, .btn-ppdb, .media-social-icon, .school-name, .f-headline, .f-child, .f-child li a, .f-child .address-box .address, .address-box .icon, footer{
                color: #636e72 !important
            }
            .btn-ppdb{
                border-color: #636e72 !important
            }

            .navigation ul li .link:hover, .media-social-icon:hover, .f-child li a:hover, .btn-ppdb:hover{
                color: black !important;
            }
            .btn-ppdb:hover{
                border-color: black !important
            }
        </style>
        @endif
    </head>
    <body>
    <div class="preload">
        <div class="loader">
            <div class="loader-inner" style="{{ ($zooq[0]->text_color == true ) ? 'color: #636e72' : 'color:' .$zooq[0]->hex_colors->hex_color }}">
                <label>	●</label>
                <label>	●</label>
                <label>	●</label>
                <label>	●</label>
                <label>	●</label>
                <label>	●</label>
            </div>
        </div>
    </div>
    @include('header.header')
    @include('navigation.navigation')
    @yield('main-app')
    <footer id="footer-content" style="{{ 'background-color:' .$zooq[0]->hex_colors->hex_color }}">
            <div class="container">
                <section class="footer-box">
                    <div class="f-child">
                        <div class="footer-brand">
                            @if($zooq[0]['isLogoActive'])
                            <img src="{{ URL::asset('assets/images/web/'.$zooq[0]['logo']) }}" class="brand-logo" alt="Your Logo School"/>
                            @endif
                            @if($zooq[0]['isNameActive'])
                            <label class="school-name">{{ $zooq[0]['name'] }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="f-child">
                        <h4 class="f-headline">Meta Link</h4>
                        <ul>
                            <li><a href="#header" class="scroll">Home</a></li>
                            <li><a href="#gallery-content" class="scroll">Gallery</a></li>
                            <li><a href="#about-content" class="scroll">About Us</a></li>
                        </ul>
                    </div>
                    <div class="f-child">
                        <h4 class="f-headline">Connect</h4>
                        <ul>
                            @foreach($media_social as $medsos)
                            <li><a href="{{ $medsos->link }}"><span class="fab {{ $medsos->logo }} icon"></span> {{ $medsos->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="f-child">
                        <h4 class="f-headline">Address</h4>
                        <div class="address-box">
                            <span class="fas fa-map-marker-alt icon"></span>
                            <span class="address">{{ $zooq[0]['address'] }}</span>
                        </div>
                        <h4 class="f-headline">Telp</h4>
                        <div class="address-box">
                            <span class="fas fa-phone icon"></span>
                            <span class="address">{{ $zooq[0]['contact'] }}</span>
                        </div>
                    </div>
                   
                </section>
                <section class="f-copyright">
                    <p>ZooQ | &copy; 2018. All Right Reserved.tsst</p>
                </section>
            </div>
        </footer>
        <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                items: 1,
                loop:true,
                autoplay:true,
                autoplayTimeout: 5000,
                smartSpeed:450,
                autoplayHoverPause:true,
            });
        });

        </script>

        
    </body>

</html>
