<div>
    
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h2 class="f-sec fw-bold">Aggiorna i tuoi dati</h2>

                {{-- form di aggiornamento articolo --}}
                <form wire:submit.prevent="updateArticle" class="f-main">
                    @csrf
                    <div class="my-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control w-25 @error('title') is-invalid @enderror" wire:model.lazy="title">
                        @error('title')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control w-50 @error('subtitle') is-invalid @enderror" wire:model.lazy="subtitle">
                        @error('subtitle')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Testo</label>
                        <input type="text" class="form-control @error('body') is-invalid @enderror" wire:model.lazy="body">
                        @error('body')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label class="form-label">Prezzo</label>
                        <input type="text" class="form-control w-25 @error('price') is-invalid @enderror" wire:model.lazy="price">
                        @error('price')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Categoria</label>
                        <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">Scegli la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    {{-- <div class="mb-3">
                        <input wire:model="temporary_images" name="images" multiple
                            class="form-control shadow @error('temporary_images.*')is-invalid @enderror"
                            type="file" placeholder="Img" />
                        @error('temporary_images.*')
                            <p class="text-danger mt-2">{{ $messages }}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>anteprima immagini</p>
                                <div class="row border border-4 border-info rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col my-3">
                                            <div class="img-preview mx-auto shadow rounded"> 
                                                 <img src="{{$image->temporaryUrl()}}" alt=""> -
                                                <img class="img-fluid" src="{{$image->getUrl(400, 300)}}" alt="">
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                                wire:click="removeImage({{$key}})">Cancella</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif  --}}

                    <button type="submit" class="btn bot bg-acc">Modifica il tuo articolo</button>
                </form>
                {{-- fine form di aggiornamento articolo --}}
            </div>
        </div>
    </div>

</div>
