@extends('layouts.app') @section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('plates.index') }}">
                <button type="button" class="btn btn-bluegreen">
                    <- Torna indietro
                </button>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                <h1 class="font-header">
                    Stai aggiungendo un nuovo piatto
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
                <div class="card-body">
                    <form action="{{ route('plates.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="">
                            <label
                                for="categoria"
                                class=""
                            >
                                
                            </label>
                            <div class="col">
                                <select
                                    class="form-control"
                                    name="category"
                                    id="category"
                                    placeholder=""
                                >
                                    <option>Nessuna categoria</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="name"
                                class=""
                            >
                                
                            </label>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Nome"
                                />
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="description"
                                class="text-md-right ml-3 mt-3"
                            >
                                
                            </label>
                            <div class="col">
                                <textarea
                                    class="form-control"
                                    type="text"
                                    name="description"
                                    id="description"
                                    placeholder="Descrizione"
                                ></textarea>
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="price"
                                class=""
                            >
                                
                            </label>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="price"
                                    id="price"
                                    placeholder="Prezzo"
                                />
                            </div>
                        </div>

                        <div class="">
                            <label
                                for="available"
                                class="text-md-right ml-3 mt-3"
                            >
                                
                            </label>
                            <div class="col">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="available"
                                        name="available"
                                        checked
                                        placeholder="Disponibilità"
                                    />
                                </div>
                            </div>
                        </div>
                        <!-- DA VERIFICARE SE E' CON INDIRIZZO O CARICAMENTO LA FOTO -->
                        <div class="">
                            <label
                                for="picture"
                                class=""
                            >
                            <!-- Qui ci va l'upload dell'immagine -->
                                
                            </label>
                            
                            @if($flag == true)
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
                            
                        </div>

                        <div class="container">
                            <div class="row py-2">
                                <div class="col mt-3 ">
                                    <input
                                        class="btn btn-bluegreen"
                                        type="submit"
                                        value="Creaa"
                                    />
                                </div>    
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
