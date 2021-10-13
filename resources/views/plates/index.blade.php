@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @foreach ($plates as $plate)
            <div class="row">
                <div class="col-10">
                    <h5 class="mt-0 mb-1">Nome: {{ $plate->name }}</h5>
                    <div>Categoria:</div>
                    <div>Descrizione: {{ $plate->description }}</div>
                    <div>Prezzo: {{ $plate->price }}</div>
                    <div>Disponibilità: {{ $plate->available }}</div>
                </div>
                <div class="col-2">
                    <img
                        class="img-thumbnail"
                        src="{{ $plate->picture }}"
                        alt="{{ $plate->name }}"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-2 text-center">
                    <a href="{{ route('plates.create') }}">
                        <button class="btn btn-bluegreen">
                            Aggiungi
                        </button>
                    </a>
                </div>
                <div class="col-2 text-center">
                    <a href="{{ route('plates.edit', $plate) }}">
                        <button class="btn btn-bluegreen">
                            Modifica
                        </button>
                    </a>
                </div>
                <div class="col-2 text-center">
                    <form action="{{ route('plates.destroy', $plate) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Cancella
                        </button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
            <hr />
            @endforeach
        </div>
        @endforeach

        <img src="/image/add.jpg" width="80px" height="80px" style="cursor:zoom-in" onclick="document.getElementById('box').style.display='block'">
        <div id="box" class="w3-modal">
            <div class="w3-modal-content">
                <header class="w3-container w3-red">
                    <span onclick="document.getElementById('box').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2>Ingredienti</h2>
                </header>
                <div class="w3-container">
                {{-- @foreach ($ingredients as $ingredient)
                    <div>{{ $ingredient->name }}</div>
                @endforeach --}}
                </div>
                {{-- <footer class="w3-container w3-red">
                    <p>Copyright 2019</p>
                </footer> --}}
            </div>
        </div>
    </div>
</div>
@endsection
