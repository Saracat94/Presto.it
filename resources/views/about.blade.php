<x-layout>

    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-12">
                
                <h1 class="text-center f-sec fw-bold text-acc mt-3 mb-5 display-5">Hakuna Matata Team</h1>       
     
                <section class="my-5">
                    <h2 class="f-main text-center mb-3">Chi siamo</h2>
                    <div class="team_box">
                      <div class="team me-3">
                        <img src="{{Storage::Url('\images\davide.jpeg')}}" alt="team_img" style="width: 208px; height: 208px; object-fit: cover;"/><span class="name">Davide</span>
                      </div>
                      <div class="team me-3">
                        <img src="{{Storage::Url('\images\Francesco.jpeg')}}" alt="team_img" style="width: 208px; height: 208px; object-fit: cover;"/><span class="name">Francesco</span>
                      </div>
                  
                      <div class="team me-3">
                        <img src="{{Storage::Url('\images\Pier.jpeg')}}" alt="team_img" style="width: 208px; height: 208px; object-fit: cover;"/><span class="name">Pier</span>
                      </div>
                      <div class="team me-3">
                        <img src="{{Storage::Url('\images\Rita.jpeg')}}" alt="team_img" style="width: 208px; height: 208px; object-fit: cover;"/><span class="name">Rita</span>
                      </div>
                      <div class="team me-3">
                        <img src="{{Storage::Url('\images\Sara.jpeg')}}" alt="team_img" style="width: 208px; height: 208px;"/><span class="name">Sara</span>
                      </div>
                    </div>
                </section>              
            </div>

            <div class="col-12 my-5 f-main">
                <h2 class="f-sec text-center mb-3">Backlog progetto</h2>

                <div class="accordion mt-4" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-bold" type="button" data-bs-parent="#accordionExample" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Progetto e finalità
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <i>Presto.it</i> è una piattaforma per il commercio online di oggetti di vario tipo, suddivisi in dieci diverse categorie.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Tecnologie utilizzate
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body gap-5">
                          <p class="my-4">
                            <b>PHP e Laravel:</b>                        linguaggio di programmazione e suo framework e utilizzati come base per lo sviluppo del sito.
                          </p>
                          <p class="mb-4">
                            <b>Vite:</b> utilizzato per facilitare l'avvio e la gestione di Bootstrap e JavaScript. 
                          </p>
                          <p class="mb-4">
                            <b>MySQL:</b> sistema di gestione del database del progetto.
                          </p>
                          <p class="mb-4">
                            <b>Fortify:</b> implementato per consentire la registrazione e l'accesso dell'utente al sistema.
                          </p>
                          <p class="mb-4">
                            <b>Livewire:</b> validazione dati e operazioni CRUD come l'inserimento degli annunci e la creazione pagina profilo per gli utenti autenticati.
                          </p>
                          <p class="mb-4">
                            <b>Spatie Image:</b> libreria per la gestione e manipolazione delle immagini caricate, quali ridimensionamento tramite cropping.
                          </p>
                          <p class="mb-4">
                            <b>Google Cloud Vision:</b> API di Google per funzionalità di analisi delle immagini e del riconoscimento visivo mediante l'utilizzo di algoritmi di intelligenza artificiale.
                          </p>
                          <p class="mb-4">
                            Linguaggio di stile  <b>CSS</b> e framework  <b>Bootstrap.</b>
                          </p>
                          <p class="mb-4">
                            <b>JavaScript:</b> per aggiungere interattività e funzionalità dinamiche alle pagine. Sono state implementazione alcune features che hanno richiesto per esempio la gestire eventi e manipolazione del DOM.
                          </p>
                          <p class="mb-4">
                            <b>Swiper:</b> per l'inserimento dei componenti di carosello (slider) scorrevoli e responsive.
                          </p>
                          <p class="mb-4">
                            <b>Popper:</b> libreria JavaScript per le funzionalità di posizionamento  pop-up. Impiegato specificatamente per la creazione dei tooltip, che forniscono informazioni aggiuntive interattive quando l'utente interagisce con elementi dell'interfaccia.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Consente il caricamento di annunci esclusivamente ad utenti loggati nel sistema. Un utente si può registrare se è nuovo sul sito ed inserire i suoi dati profilo, oppure effettuare il login. Ad annuncio inserito, l'utente visualizza un messaggio di conferma e dovrà attendere l'approvazione di uno dei revisori.                            
                        </div>
                      </div>
                    </div>
                  </div>
                
            </div>

        </div>
    </div>

</x-layout>

