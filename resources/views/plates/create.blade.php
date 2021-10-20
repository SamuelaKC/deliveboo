@extends('layouts.app') @section('content')

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-4">

                <h1 class="font-header title-form">
                    Aggiungi il tuo Piatto
                </h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('plates.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="categoria" class="">
                            Inserisci il tipo di piatto
                        </label>

                        <select class="form-control" name="category" id="category" placeholder="">
                            <option>Nessuna categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mt-3">
                        <label for="name" class="">
                            Inserisci il nome del tuo piatto
                        </label>

                        <input class="form-control" type="text" name="name" id="name" placeholder="Nome" />

                    </div>
                    <div class="mt-3">
                        <label for="description" class="">
                            Inserisci una breve descrizione
                        </label>

                        <textarea class="form-control" type="text" name="description" id="description"
                            placeholder="Descrizione"></textarea>

                    </div>
                    <div class="mt-3">
                        <label for="price" class="">
                            Prezzo
                        </label>

                        <input class="form-control" type="number" step="0.01" min="0" name="price" id="price"
                            placeholder="Prezzo" />

                    </div>

                    <div class="mt-3">


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="available" name="available" checked
                                placeholder="Disponibilità" />
                            <label for="available" class="">
                                Disponibilità
                            </label>
                        </div>

                    </div>
                    <!-- DA VERIFICARE SE E' CON INDIRIZZO O CARICAMENTO LA FOTO -->
                    {{-- <div class="">
                            <label
                                for="picture"
                                class=""
                            >
                            <!-- Qui ci va l'upload dell'immagine -->
                                
                            </label>
                            
                            @if ($flag == true)
                                <button class="btn btn-light" type="button">ciao</button>
                            @else
                                <div class="col">
                                    <input
                                        class="form-control"
                                        type="file"
                                        name="picture"
                                        id="picture"
                                    />
                                </div>
                            @endif
                            
                        </div> --}}

                    <div class="mt-3">

                        <input class="btn btn-bluegreen" type="submit" value="Crea" />



                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
