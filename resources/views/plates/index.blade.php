@extends('layouts.app') @section('content')
    <div class="container">
        <h1 class="text-center mt-3 title-form">I Tuoi Piatti</h1>

        {{-- @dd($plates) --}}
        @foreach ($plateCategory as $category => $platesOfCategory)

            <h2 class="mt-4 mb-3">{{ $category }}</h2>

            @foreach ($platesOfCategory as $plate)
                <div class="row">

                    <div class="col-9 col-md-10 myplate-text">
                        <h5 class="mt-0 mb-1">Nome: {{ $plate->name }}</h5>

                        <div>Descrizione: {{ $plate->description }}</div>
                        <div>Prezzo: € {{ number_format($plate->price, 2) }}</div>
                        <div>Disponibilità: {{ $plate->available }}</div>
                    </div>
                    <div class="col-3 col-md-2 myplate-img">
                        <img class="" src="{{ asset("storage/" . $plate->picture) }}" alt="{{ $plate->name }}" />
                        <a href="{{ route('plates.editimg', $plate) }}" class="myplate-img-button">
                            <button class="btn btn-sm btn-bluegreen">Modifica</button>
                        </a>
                    </div>
                </div>

                <div class="row">

                    <div class="col-8 col-md-9">
                        <div class="row justify-content-end">

                            <a href="{{ route('plates.edit', $plate) }}" class="mr-3">
                                <button class="btn btn-bluegreen">
                                    Modifica
                                </button>
                            </a>
                        
                            <form action="{{ route('plates.destroy', $plate) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger">
                                    Cancella
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
                <hr />

            @endforeach
        @endforeach

    </div>
@endsection
