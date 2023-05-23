<x-layout>
    
    <div class="container-fluid bg-main">
        <div class="row">

            <h1 class="text-center f-sec m-3 fw-bold">
                Elenco articoli revisionati
            </h1>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article=$article />
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow">
                        <p class="lead">Non ci sono annunci</p>
                    </div>
                </div>
            @endforelse
        </div>
        {{ $articles->links() }}
    </div>


</x-layout>