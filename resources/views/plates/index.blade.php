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
    </div>
</div>
@endsection
