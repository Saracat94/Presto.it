<div>

    
<div class="container d-flex">
    <div class="row my-5">
        <div class="col-12">
            <h2 class="text-center my-4 f-sec fw-bold display-6">Aggiorna i dati del tuo profilo</h2>
                       
            <form wire:submit.prevent="updateProfile" class="f-main">
                @csrf
                <div class="mt-4 mb-3">
                    <label class="fw-bold" for="name">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name">
                    @error('name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-bold" for="surname">Cognome</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" wire:model.lazy="surname">
                    @error('surname')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4 mb-3">
                    <label class="fw-bold" for="birth">Data di nascita</label>
                    <input type="date" placeholder="yyy-mm-dd" class="form-control @error('birth') is-invalid @enderror" wire:model.lazy="birth">
                    @error('birth')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="fw-bold" for="address">Indirizzo</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model.lazy="address">
                    @error('address')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-check-inline m-3">
                    <label class="fw-bold" for="gender">Genere</label><br>
                    <input class="form-check-input mb-2" type="checkbox" id="gender-male" name="gender" value="Uomo" wire:model="male">
                    <label for="gender-male">Uomo</label><br>
                    <input class="form-check-input mb-2" type="checkbox" id="gender-female" name="gender" value="Donna" wire:model="female">
                    <label for="gender-female">Donna</label><br>
                    <input class="form-check-input mb-2" type="checkbox" id="gender-other" name="gender" value="Altro" wire:model="other">
                    <label for="gender-other">Altro</label>
                    @error('gender')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-check-inline m-3">
                    <h4 class="fw-bold" for="gender">Genere</h4><br>
                    <input class="form-check-input mb-2" type="radio" id="gender-male" name="gender" value="Uomo" wire:model="male">
                    <label for="gender-male">Uomo</label><br>
                    <input class="form-check-input mb-2" type="radio" id="gender-female" name="gender" value="Donna" wire:model="female">
                    <label for="gender-female">Donna</label><br>
                    <input class="form-check-input mb-2" type="radio" id="gender-other" name="gender" value="Altro" wire:model="other">
                    <label for="gender-other">Altro</label>
                    @error('gender')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}                
                           
                <div class="mb-3">
                    <label class="fw-bold" for="country">Nazione</label>
                    <select class="form-control @error('country') is-invalid @enderror" wire:model.lazy="country">
                        <option value="" class="text-muted">Seleziona una nazione</option>
                        @foreach ($countryOptions as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('country')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-bold" for="city">Città</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model.lazy="city">
                    @error('city')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-bold" for="cap">Cap</label>
                    <input type="number" class="form-control @error('cap') is-invalid @enderror" wire:model.lazy="cap">
                    @error('cap')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div for="tel">
                    <label class="form-label fw-bold">N. telefono</label>
                    <input type="number" placeholder="+39" class="form-control @error('tel') is-invalid @enderror" wire:model.lazy="tel">
                    @error('tel')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn bg-acc mt-3">Aggiorna profilo</button>
            </form>
        </div>
    </div>
</div>

    


</div>
