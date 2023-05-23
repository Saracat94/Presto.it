<x-layout>
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <!-- Info Profilo -->
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="px-4 pt-0 pb-4 cover">
                        <div class="media align-items-end profile-head">
                            <div class="profile mr-3">
                                <img src="https://blog.caseperferiepergruppi.it/wp-content/uploads/2019/07/Cattura.png"
                                    alt="avatar user" width="130" class="rounded mb-2 img-thumbnail">
                                <a href="{{route('profile.edit', $profile)}}" class="link-light btn-sm btn-block">Modifica Profilo</a>
                            </div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0">{{ $profile->name }} {{ $profile->surname }}</h4>
                                <p class="small mb-4">
                                    <i class="fas fa-map-marker-alt me-2"></i>{{ $profile->city }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-4 d-flex justify-content-end text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <h5 class="fw-bold mb-0 d-block f-main">215</h5>
                                <small class="text-muted">
                                    <i class="fas fa-image me-1 f-main"></i> Articoli
                                </small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="fw-bold mb-0 d-block f-main">745</h5>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1 f-main"></i> Clienti
                                </small>
                            </li>
                            </li>
                        </ul>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-0 fw-bold f-sec">Informazioni personali</h5>
                        <div class="p-4 rounded shadow-sm bg-light">
                            @if (!empty($profile->gender))
                                <p class="mb-0 f-main">
                                    SESSO: {{ $profile->gender }}
                                </p>
                            @else
                                <p class="mb-0 f-main">
                                    SESSO: Non specificato
                                </p>
                            @endif
                            <p class="mb-0 f-main">DATA DI NASCITA: {{ $profile->birth }}</p>
                            <p class="mb-0 f-main">NAZIONE: {{ $profile->country }}</p>
                            <p class="mb-0 f-main">INDIRIZZO: {{ $profile->address }}, {{ $profile->city }},
                                {{ $profile->cap }}</p>
                            <p class="mb-0 f-main">NUMERO DI TELEFONO: (+39) {{ $profile->tel }}</p>
                        </div>
                    </div>
                    <div class="px-4 pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0 fw-bold f-sec">I tuoi articoli</h5>
                            <a href="#" class="btn btn-link text-muted f-main">Mostra tutti</a>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- inizio CAROUSEL -->
                                <section>
                                    <ul class="cards" id="carousel-cards">

                                        @foreach ($articles as $article)
                                            <li class="cardcar">
                                                <div class="col-12 col-md-4">
                                                    <x-card :article=$article />
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </section>
                                <!-- fine CAROUSEL -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
