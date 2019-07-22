<section id="gallery-content" class="content">
        <div class="container">
            <h2 class="title">Gallery</h2>
            <div class="row">      
                <?php 
                $temp = 0;
                $jml_baris = ceil($galleries->count()/4);
                $jml_kolom = 4;
                ?>            
                @for ($i = 0; $i < $jml_kolom; $i++)
                    <div class="column">
                        @for ($j = 0; $j < $jml_baris; $j++)
                        <?php 
                        $temp = $i;
                        $temp += 4 * $j;
                        ?>
                            
                            @if ($temp < $galleries->count())
                            <a href="{{ url('gallery/'.$galleries[$temp]['gallery_id'].'/view') }}">
                                <div class="box-image">                            
                                    <img class="loading" src="{{ URL::asset('assets/images/gallery/'.$galleries[$temp]['image']) }}" />
                                    <h4 class="image-title">{{ $galleries[$temp]['title'] }}</h4>
                                    <p class="image-description">{{ $galleries[$temp]['description'] }}</p>
                                    <div class="time-upload"><span class="far fa-clock"></span> {{ $galleries[$temp]['created_at']->format('l, d M Y') }}</div>
                                </div>
                            </a>
                            @endif
                            
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </section>