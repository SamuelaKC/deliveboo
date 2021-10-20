@extends('layouts.app') @section('content')
    <div class="container py-5">
       
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-4">

                <h1 class="font-header title-form">
                    Stai modificando: 
                </h1>
                <h2>{{ $plate->name }}</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('plates.update', $plate) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mt-3">
                        <label for="category" class="">
                            Seleziona il tipo di piatto
                        </label>

                        <select class="form-control" name="category" id="category">
                            <option>Nessuna categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id === $plate->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mt-3">
                        <label for="name" class="">
                            Inserisci il nome del tuo piatto
                        </label>

                        <input class="form-control" type="text" name="name" id="name" value="{{ $plate->name }}"
                            placeholder="Nome" />

                    </div>

                    <div class="mt-3">
                        <label for="description" class="">
                            Inserisci una breve Descrizione
                        </label>

                        <textarea class="form-control" type="text" name="description" id="description"
                            placeholder="Descrizione del piatto">{{ $plate->description }}</textarea>

                    </div>
                    <div class="mt-3">
                        <label for="price" class="">
                            Prezzo
                        </label>

                        <input class="form-control" type="number" step="0.01" min="0" name="price" id="price"
                            placeholder="Prezzo" value="{{ $plate->price }}" />

                    </div>

                    <div class="mt-3 form-check">

                        <input class="form-check-input" type="checkbox" name="available" id="available flexCheckDefault"
                            checked placeholder="Disponibilità" />
                        <label for="available" class="">
                            Disponibilità
                        </label>
                    </div>


                    <!-- DA VERIFICARE SE E' CON INDIRIZZO O CARICAMENTO LA FOTO -->
                    {{-- <div class="">
                        <label for="picture" class="col-md-4  text-md-right">

                        </label>

                        <input class="form-control" type="text" name="picture" id="picture"
                            value="{{ $plate->picture }}" />

                    </div> --}}

                    <div class="mt-3">
                        <input class="btn btn-bluegreen" type="submit" value="Invia" />
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
