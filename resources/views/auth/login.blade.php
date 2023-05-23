<x-layout>

    <div class="container vh-100">
        <div class="row my-5 vh-100">
            <div class="col-12 col-md-6 box">
                <h2 class="f-sec fw-bold">Compila i dati per il Login</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="my-3">
                        <label class="form-label f-main  ">📧 Indirizzo Email</label>
                        <input type="email" class="form-control prova" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">🗝️ Password</label>
                        <input type="password" class="form-control prova" name="password">
                    </div>
                    <div class="text-center box3">
                        <button type="submit" class="btn btn-primary bot my-3">Accedi</button>
                        <p class="f-sec">Non sei un membro? <a class="f-sec text-acc fw-bold" href="{{ route('register') }}">Registrati</a></p>
                        <p class="f-sec">Iscriviti con:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f text-acc"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google text-acc"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter text-acc"></i>
                        </button>                     
                    </div>
                </form>
            </div>

            <div class="col-6 d-none d-lg-block box2">
                <img src="https://cdn.discordapp.com/attachments/1109479193261125712/1109483817594527774/hakuna-matata-interior_59_d8c47.webp" style="height: 600px">
            </div>
        </div>
    </div>

</x-layout>
