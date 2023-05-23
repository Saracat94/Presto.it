<x-layout>
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <h1 class="f-sec fw-bold">
                    {{ $article_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-warning ps-5">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($article_to_check)
        <div class="container bg-main">
            <div class="row">
                <div class="col-12 col-lg-6">

                    {{-- <div class="card mb-3 f-main mx-auto" style="width: 50rem;"> --}}
                    {{-- CAROSELLO di Dettaglio --}}
                    <div>
                        <div thumbsSlider="" class="swiper mySwiper mt-3">
                            <div class="swiper-wrapper">
                                @foreach ($article_to_check->images as $image)
                                    <div class="swiper-slide m-3 thumb">
                                        <img src="{{ Storage::url($image->path) }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div style="--swiper-navigation-color: transparent; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2 mt-4 h-100">
                            <div class="swiper-wrapper h-100">
                                @foreach ($article_to_check->images()->get() as $image)
                                    <div class="swiper-slide h-100">
                                        <img src="{{ $image->getUrl(480, 480) }}">
                                        <div class="card-body z-3 revisione pt-2">
                                            @if ($image->labels)
                                            <h5 class="fw-bold f-main">Contenuto:</h5>
                                                @foreach ($image->labels as $label)
                                                
                                                    <p class="d-inline">{{ $label }},</p>
                                                @endforeach
                                            @endif
                                            <h5 class="fw-bold f-main pt-2">Revisione Immagini</h5>
                                            <p class="f-main">Adulti: <span class="{{ $image->adult }}"></span></p>
                                            <p class="f-main">Satira: <span class="{{ $image->spoof }}"></span></p>
                                            <p class="f-main">Medicina: <span class="{{ $image->medical }}"></span></p>
                                            <p class="f-main">Violenza: <span class="{{ $image->violence }}"></span></p>
                                            <p class="f-main">Contenuto Esplicito: <span class="{{ $image->racy }}"></span></p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        </div>
                   </div>
                    {{-- fine CAROSELLO di Dettaglio --}}

                </div>

                <div class="col-12 col-lg-6 mt-5">

                    {{-- inizio SCHEDA Dettaglio --}}
                    <div class="card-body mt-3">
                        <h5 class="card-title f-sec fw-bold display-6">{{ $article_to_check->title }}</h5>
                        <p class="card-text f-sec">{{ $article_to_check->subtitle }}</p>
                        <hr>
                        <p class="card_text f-main fs-6">DESCRIZIONE:<br>{{ $article_to_check->body }}</p>
                        <p class="card-text f-sec fw-bold">Prezzo: <span
                                class="text-acc fw-bold h4">{{ $article_to_check->price }} €</span></p>
                    </div>
                    <hr>
                    <p class=" mt-3 f-main">Pubblicato il: {{ $article_to_check->created_at->format('d/m/Y') }} -
                        Venditore:&nbsp; <b>{{ $article_to_check->user->name ?? '' }}</b></p>
                </div>

                <div class="col-12 boxCat p-2 text-center mt-4">
                    <a class="f-sec fw-bold text-acc h5 text-decoration-none"
                        href="{{ route('categoryShow', ['category' => $article_to_check->category]) }}">{{ $article_to_check->category->name }}</a>
                </div>
            </div>

        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-12 col-md-6 mb-2 d-flex justify-content-around">
    
                    <form action="{{ route('acceptArticle', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="buttonRev me-2 f-main" id="accept">
                            <span> Accetta</span>
                        </button>
                    </form>
    
                    <form action="{{ route('undoArticle', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="buttonRev me-2 f-main" id="wait">
                            <span> Attendi</span>
                        </button>
                    </form>
    
                    <form action="{{ route('rejectArticle', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="buttonRev f-main" id="refuse">
                            <span> Rifiuta</span>
                        </button>
                    </form>
    
                </div>
            </div> 
        </div>
    @endif
    <div class="container f-sec my-3">
        <a href="{{ route('revisorHistory') }}" class="h3 fw-bold mt-5">Cronologia annunci revisionati</a>
    </div>

</x-layout>
