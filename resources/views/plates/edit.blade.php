@extends('layouts.app') @section('content')
<div class="container ">
    <div class="row">
        <div class="col">
            <a href="{{ route('plates.index') }}">
                <button type="button" class="btn btn-light">
                    <- Torna indietro
                </button>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Stai modificando: {{ $plate->name }}
                </div>
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
                    <form
                        method="POST"
                        action="{{ route('plates.update', $plate) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label
                                for="category"
                                class="col-md-4 col-form-label text-md-right"
                            >
                                Categoria:
                            </label>
                            <div class="col-md-6">
                                <select
                                    class="form-control"
                                    name="category"
                                    id="category"
                                >
                                    <option>Nessuna categoria</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $category->id === $plate->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                for="name"
                                class="col-md-4 col-form-label text-md-right"
                                > 
                                Nome:
                            </label>
                            <div class="col-md-6">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ $plate->name }}"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="description"
                                class="col-md-4 col-form-label text-md-right"
                                > 
                                Descrizione:
                            </label>
                            <div class="col-md-6">
                                <textarea
                                    class="form-control"
                                    type="text"
                                    name="description"
                                    id="description"
                                    placeholder="Descrizione del piatto"
                                    >{{ $plate->description
                                    }}</textarea
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                for="price"
                                class="col-md-4 col-form-label text-md-right"
                                >
                                Prezzo:
                            </label>
                            <div class="col-md-6">
                                <input
                                    class="form-control"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="price"
                                    id="price"
                                    value="{{ $plate->price
                                }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                for="available" class="col-md-4 col-form-label text-md-right"
                                > Disponibilità:
                            </label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="available"
                                        id="available flexCheckDefault"
                                        checked
                                    />
                                </div>
                            </div>
                        </div>
                        <!-- DA VERIFICARE SE E' CON INDIRIZZO O CARICAMENTO LA FOTO -->
                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right"
                                > 
                                Inserisci l'url della tua foto:
                            </label>
                            <div class="col-md-6">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="picture"
                                    id="picture"
                                    value="{{ $plate->picture
                                }}"
                                />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input
                                    class="btn btn-light"
                                    type="submit"
                                    value="Invia"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
