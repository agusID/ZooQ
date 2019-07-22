<header id="header" style="{{ 'background-color:' .$zooq[0]->hex_colors->hex_color }}">
    <div class="container">
        <div class="navbrand">
            <div class="box flex-1 flex-center">
                @if($zooq[0]['isLogoActive'])
                <a href="{{ url('/') }}"><img src="{{ URL::asset('assets/images/web/'.$zooq[0]['logo']) }}" class="brand-logo" alt="{{ $zooq[0]['name'] }}"/></a>
                @endif
            
                @if($zooq[0]['isNameActive'])
                <label class="school-name">{{ $zooq[0]['name'] }}</label>
                @endif
                
            </div>
            <div class="box flex-0 flex-center">
                <div class="btn-set">
                    <span class="social-media-group">
                    @foreach($media_social as $medsos)
                    <a href="{{ $medsos->link }}" class="media-social-icon"><i class="fab {{ $medsos->logo }}"></i></a>
                    @endforeach
                    </span>
                    <a href="{{ url('/login') }}" class='btn-ppdb'>Sign In</a>
                </div> 
            </div>
        </div>
    </div>
</header>