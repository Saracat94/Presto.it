<x-layout>

    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-12">
                <h1 class="f-sec text-center">{{__('ui.welcome')}}</h1>                
            </div>
            
            @if (session()->has('message'))
                <div class="alert alert-success f-main">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('message_invalid'))
                <div class="alert alert-danger f-main">
                    {{ session('message_invalid') }}
                </div>
            @endif

            <div class="div d-none d-lg-flex">
                <h2 class="f-sec mb-3">{{__('ui.allCategories')}}</h2>
            </div>

            <div class="container icons d-none d-lg-flex">
                <div class="row">
                    <div class="col-12">
                        @foreach ($categories as $category)
                        <div class="firsticon position-relative"> 
                            <a href="{{route('categoryShow', compact('category'))}}" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover"><img  class="position-absolute point-burst top-50 start-50 translate-middle" src="{{Storage::url("icons/$category->name.png")}}"></a>   
                        </div>
                               
                        <div role="tooltip" class="text-acc fw-bold tooltip">{{ $category->name }}
                            {{-- @foreach ($categories as $category)
                            <a href="{{ route('categoryShow', compact('category'))}}">{{ $category->name }}</a>
                            @endforeach --}}
                            <div class="arrow" data-popper-arrow></div>
                        </div>                        
                        
                        @endforeach
                    </div>
                </div>
            </div>

            
            {{-- <button id="button" aria-describedby="tooltip">My button</button>
            <div id="tooltip" role="tooltip" class="text-acc fw-bold">
                Prova popover
                <div id="arrow" data-popper-arrow></div>
            </div>  --}}

                   

            <div class="col-12 mt-5">
                <!-- CAROUSEL -->
                <section>
                    <h2 class="f-sec pt-3">{{__('ui.allArticles')}}</h2>
                    <ul class="cards m-4" id="carousel-cards">

                        @foreach ($articles as $article)
                        <li class="cardcar">
                            <div class="col-12 col-md-4">
                                <x-card 
                                :article=$article />
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </section>
                <!-- CAROUSEL-END -->
            </div>
        </div>
    </div>

</x-layout>
