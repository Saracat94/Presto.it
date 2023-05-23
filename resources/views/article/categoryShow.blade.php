<x-layout>
    <div class="container-fluid">
        <div class="row ps-lg-5 m-lg-5 mt-4">
            <h1 class="f-sec">Sei nella categoria: {{$category->name}}</h1>
                @forelse ($articles as $article)
                    <div class="col-12 col-md-4 my-2 d-flex justify-content-center d-md-block">
                        <x-card :article='$article' />
                    </div>
                @empty
                    <div class="col-12 f-sec">
                        <p class="h2">Non sono presenti annunci per questa categoria!</p>
                        <p class="h3">Pubblicane uno: <a href="{{ route('createArticle') }}" class="btn btn-success shadow">Nuovo Annuncio</a></p>
                    </div>
                @endforelse
        </div>
        {{$articles->links()}}
    </div>
</x-layout>
