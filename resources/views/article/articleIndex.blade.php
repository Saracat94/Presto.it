<x-layout>

    <div class="container-fluid bg-main">
        <div class="row ps-lg-5 m-lg-5 mt-4">

            <h1 class="text-center f-sec m-lg-3 fw-bold">
                Elenco annunci
            </h1>
            @if (session()->has('message'))
                <div class="alert alert-success f-main">
                    {{ session('message') }}
                </div>
            @endif
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 d-flex justify-content-center d-md-block">
                    <x-card :article=$article />
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning py-3 f-main shadow">
                        <p class="lead">Non ci sono annunci per questa ricerca</p>
                    </div>
                </div>
            @endforelse
        </div>
        {{ $articles->links() }}
    </div>

</x-layout>
