@extends('layouts.app') @section('content')
<div class="container">
        <div class="row">
        <div class="col">
            <a href="{{ route('dashboard') }}">
                <button type="button" class="btn btn-light">
                    Pagina principale
                </button>
            </a>
        </div>
    </div>

    <div class="row">
         @foreach ($orders as $order)
        <div class="col-4 order">
            <div class="card-body">
                <div>Nome: {{ $order->name_surname }}</div>
                <div>Indirizzo:{{ $order->address }}</div>
                <div>Numero di Telefono: {{ $order->phone_number }}</div>
                <div>Totale Ordine: {{ $order->total_price }}</div>
                <div>Ordine:</div>
                @foreach ($order->plate as $plate )
                <div class="col plate">
                    <div>{{ $plate->name }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
