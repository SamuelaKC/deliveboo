@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        @foreach ($plates as $plate)
        <div class="col-4 plate">
            <div class="card-body">
                <div>Name: {{ $plate->name }}</div>
                <div>Description:{{ $plate->description }}</div>
                <div>Price: {{ $plate->price }}</div>
                <div>Disponibilità: {{ $plate->available }}</div>
                <div>Picture: {{ $plate->picture }}</div>
                <a href="{{ route('plates.create') }}">
                    <button class="btn btn-light">
                        Aggiungi
                    </button>
                </a>
                <a href="{{ route('plates.edit', $plate) }}">
                    <button class="btn btn-light">
                        Modifica
                    </button>
                </a>
                <a href="{{ route('plates.destroy', $plate) }}">
                    <button class="btn btn-danger">
                        Cancella
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
