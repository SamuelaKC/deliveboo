@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        {{-- @dd($plates) --}}
        <div class="col">
            @foreach ($plates as $categoryId => $cat)
            @foreach ($cat as $plate)
                         @foreach ($categories as $category )
                        <h2>{{$category->id === $plate->category_id ? $category->name : ''}}</h2>
                        @endforeach
            <div class="row">
                <h2></h2>
                <div class="col-10">
                    <h5 class="mt-0 mb-1">Nome: {{ $plate->name }}</h5>
                    {{-- <div>
                        Categoria:
                         @foreach ($categories as $category )
                        {{$category->id === $plate->category_id ? $category->name : ''}}
                        @endforeach
                    </div> --}}
                    <div>Descrizione: {{ $plate->description }}</div>
                    <div>Prezzo: € {{ number_format ( $plate->price, 2) }}</div>
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
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-12 col-md-3 col-lg-3 text-center">
                    <a href="{{ route('plates.edit', $plate) }}">
                        <button class="btn btn-bluegreen">
                            Modifica
                        </button>
                    </a>
                </div>
                <div class="col-12 col-md-3 col-lg-3 text-center">
                    <form
                        action="{{ route('plates.destroy', $plate) }}"
                        method="POST"
                    >
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">
                            Cancella
                        </button>
                    </form>
                </div>
                <div class="col-md-3 col-lg-3"></div>
            </div>
            <hr />
            
            @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection
