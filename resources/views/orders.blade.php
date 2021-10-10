@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        sono gli ordini @foreach ($orders as $order)
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
