@extends('layouts.app') @section('content')
<div class="container ">
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
                    Stai modificando: {{ $plate->name }}
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
                    <form
                        method="POST"
                        action="{{ route('plates.update', $plate) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('PUT')
                        <div class="">
                            <label
                                for="category"
                                class=""
                            >
                            </label>
                            <div class="col">
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
                                    value="{{ $plate->name }}"
                                    placeholder="Nome"
                                />
                            </div>
                        </div>

                        <div class="">
                            <label
                                for="description"
                                class=" text-md-right ml-3 mt-3"
                                > 
                                
                            </label>
                            <div class="col">
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
                        <div class="">
                            <label
                                for="price"
                                class="text-md-right ml-3 mt-3"
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
                                    value="{{ $plate->price
                                }}"
                                />
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="available" class=""
                                > 
                            </label>
                            <div class="col">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="available"
                                        id="available flexCheckDefault"
                                        checked
                                        placeholder="Disponibilità"
                                    />
                                </div>
                            </div>
                        </div>
                        <!-- DA VERIFICARE SE E' CON INDIRIZZO O CARICAMENTO LA FOTO -->
                        <div class="">
                            <label for="picture" class="col-md-4  text-md-right"
                                > 
                                
                            </label>
                            <div class="col">
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

                        <div class="container">
                            <div class="row py-2">
                                <div class="col ">
                                    <input
                                        class="btn btn-bluegreen"
                                        type="submit"
                                        value="Invia"
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
