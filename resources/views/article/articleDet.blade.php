<x-layout>

    <div class="container">
        <div class="row my-3 bg-main">
            @if (session()->has('message'))
                <div class="bg-warning fw-light f-main ps-5">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="d-flex">
                <h1 class="f-sec display-4 text-start fw-bold mt-4 mb-5 mx-3">
                    Dettaglio annuncio
                </h1>
                @if (Auth::check())
                    @if (Auth::user()->is_revisor)
                        <form action="{{route('undoArticle', compact('article'))}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="buttonRev mt-5 mx-3 f-main" id="revisor"><span>Revisiona</span></button>
                        </form>
                    @elseif (Auth::user()->id === $article->user->id)
                        <div>
                            <button href="{{ route('articleEdit', $article) }}" class="buttonRev mt-5 mx-3 f-main" id="revisor"><span>Modifica</span></button>
                        {{-- 
                            <button class="buttonRev mt-5 mx-3 f-main" id="refuse2" wire:click="articleDelete({{$article->id}})"><span>Elimina</span></button>--}}
                        </div>
                    @else

                    @endif

                    <div class="d-flex">
                        @if (Auth::user()->id === $article->user->id)
                        <form action="{{ route('articleDelete', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="buttonRev mt-5 mx-3 f-main" id="refuse2">
                                <span>Elimina</span>
                            </button>
                        </form>
                                
                        @endif
                    </div>
                    
                    @endif
            </div>

            <div class="col-12 col-lg-5">
                {{-- CAROSELLO di Dettaglio --}}
                <div>
                    <div style="--swiper-navigation-color: transparent; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 mt-4">
                        <div class="swiper-wrapper">
                            @foreach ($article->images()->get() as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->getUrl(480, 480) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <div thumbsSlider="" class="swiper mySwiper mt-3">
                        <div class="swiper-wrapper">
                            @foreach ($article->images as $image)
                                <div class="swiper-slide m-3 thumb">
                                    <img src="{{ Storage::url($image->path) }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- fine CAROSELLO di Dettaglio --}}
            </div>

            <div class="col-12 col-lg-7">

                {{-- inizio SCHEDA Dettaglio --}}
                <div class="card-body mt-3 pe-lg-5">
                    <h5 class="card-title f-sec fw-bold display-6">{{ $article->title }}</h5>
                    <p class="card-text f-sec">{{ $article->subtitle }}</p>
                    <hr>
                    <p class="card-text f-sec fw-bold">Prezzo: <span class="text-acc fw-bold h4">{{ $article->price }}
                            €</span></p>
                    <div class="row">
                        <div class="d-flex col-6">
                            <div><button type="button" class="btn btn-buy bg-acc f-sec text-white me-3">Aggiungi al
                                    carrello<i class="fa-solid fa-cart-shopping me-1 ps-1"></i></button></div>
                            <button class="icon-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" id="Heart">
                                    <path
                                        d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-6 d-flex-inline">
                            <i class="fa-solid fa-truck me-2"></i><span class="f-main fw-light mb-2 f-sec">Consegna
                                Gratuita per ordini superiori ai 60€.</span><br>
                            <i class="fa-solid fa-boxes-packing me-2 mt-2"></i><span class="f-main fw-light f-sec">Resi
                                gratuiti. Si applicano i Termini e Condizioni dell'offerta.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex">
                            <img src="{{ Storage::url('images\icons8-mastercard-48.png') }}" alt="">
                            <img src="{{ Storage::url('images\logo-stripe.png') }}" alt="">
                            <img src="{{ Storage::url('images\logo-paypal.png') }}" alt="">
                            <img src="{{ Storage::url('images\logo-visa.png') }}" alt="">
                        </div>
                    </div>
                    <p class="card_text fs-6 pt-3"><span
                            class="f-sec fw-bold fs-5 mb-2">DESCRIZIONE:<br></span>{{ $article->body }}</p>
                </div>
                <hr>
                <p class=" mt-3 f-main">Pubblicato il: {{ $article->created_at->format('d/m/Y') }} -
                    Venditore:&nbsp; <b>{{ $article->user->name ?? '' }}</b></p>
            </div>

            <div class="col-12 boxCat p-2 text-center mt-4">
                <a class="f-sec fw-bold text-acc h5 text-decoration-none"
                    href="{{ route('categoryShow', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
            </div>
        </div>
        {{-- fine SCHEDA Dettaglio --}}
        <div class="row mb-5">
            <section>
                <h2 class="f-sec text-acc fw-bold ms-3 pt-3">Guarda altri prodotti correlati</h2>
                <ul class="cards pt-0" id="carousel-cards">
                    @foreach ($articles as $article)
                        @if ($article->category_id === $article->category->id)
                            <li class="cardcar">
                                <div class="col-12 col-md-4">
                                    <x-card :article=$article />
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        </div>
    </div>

</x-layout>
