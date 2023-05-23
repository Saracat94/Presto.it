{{-- <div class="card mb-3" style="width: 18rem;"> --}}
{{-- @if ($article->image)
        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="cover immagine">
    @else
        <img src="https://picsum.photos/200" class="card-img-top" alt="immaginde default">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <p class="card-text">Descrizione: {{$article->body}}</p>
        <p class="card-text">Prezzo: {{$article->price}}€</p>
        <p class="card-text">pubblicato il:  {{$article->created_at->format('d/n/Y')}}</p>
        <a href="{{route('articleDet', compact('article'))}}" class="btn btn-primary">Vai al dettaglio</a>
    </div>
</div> --}}


{{-- NUOVA card --}}

{{-- <div class="card-list"> --}}
<div class="card my-3" style="width: 18rem;">
    <figure class="card-image">
        @if ($article->images)
            <img class="card-image" src="{{!$article->images()->get()->isEmpty() ? Storage::url($article->images()->first()->path) : 'https://picsum.photos/200'}}"
                alt="An orange painted blue, cut in half laying on a blue background" />
        @else
            <img src="https://picsum.photos/200" alt="immaginde default">
        @endif
    </figure>
    <div class="card-header position-relative p-2">
        <h5 class="card-title f-sec fw-bold">{{ $article->title }}</h5>
        {{-- <p class="card-text">Descrizione: {{$article->body}}</p> --}}
        <p class="card-text f-main mb-1">{{ $article->price }}€</p>
        <button class="icon-button position-absolute m-2 bottom-0 end-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block"
                id="Heart">
                <path
                    d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
            </svg>
        </button>
    </div>
    <div class="card-footer d-flex justify-content-between">

        {{-- <div class="rating">
            <span class="rating__result"></span> 
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
        </div> --}}

        <div class="card-meta">
            <svg class="f-main" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block"
                id="EyeOpen">
                <path
                    d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19c-4.182 0-7.764-4.013-9.257-5.962a1.692 1.692 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5c4.182 0 7.764 4.013 9.257 5.962z" />
                <circle cx="12" cy="12" r="3" />
            </svg>
            965
        </div>
        <div class="card-meta">
            <svg class="f-main" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block"
                id="Calendar">
                <rect x="2" y="4" width="20" height="18" rx="4" />
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <path d="M2 10h20" />
            </svg>
            {{ $article->created_at->format('d/n/Y') }}
        </div>
      
    </div>
    <a href="{{ route('articleDet', compact('article')) }}" class="btn btn-card btn-primary f-main mt-2">{{__('ui.details')}}</a>
</div>
