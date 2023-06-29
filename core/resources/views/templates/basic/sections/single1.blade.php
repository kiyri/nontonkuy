<section class="trailer-section ptb-80 bg-overlay-black bg_img section" data-section="recent_added" style="background: url('{{ getImage(getFilePath('item_landscape').'/'.@$single[0]->image->landscape) }}')">
    <div class="trailer-overlay"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="trailer-content">
                    <h1 class="title text-white">{{ __(@$single[0]->title) }}</h1>
                    <p>{{ __(@$single[0]->preview_text) }}</p>
                    <div class="trailer-btn">
                        @if(@$single[0]->item_type == 3)
                            <a href="{{ route('watch', @$single[0]->id??0) }}" class="btn--base">@lang('Watch Trailer')</a>
                        @else
                            <a href="{{ route('watch', @$single[0]->id??0) }}" class="btn--base">@lang('Watch Now')</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="trailer-video-wrapper">
                    <div class="trailer-thumb">
                        <img src="{{ getImage(getFilePath('item_landscape').'/'.@$single[0]->image->landscape) }}" alt="trailer">
                        <div class="trailer-thumb-overlay">
                            <a class="video-icon" data-rel="lightcase:myCollection" href="{{ route('watch', @$single[0]->id??0) }}">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>