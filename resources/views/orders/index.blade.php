@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-12  m-3">
            <h1 class=" font-header">I tuoi ordini</h1>
        </div>

        <div class="col">
            @foreach ($orders as $order)
            <div class="row">
                <div class="col">
                    <div class="bold-table m-2">Dettagli cliente</div>
                    <div>Nome: {{ $order->name_surname }}</div>
                    <div>Indirizzo: {{ $order->address }}</div>
                    <div>Numero di Telefono: {{ $order->phone_number }}</div>
                    <div class="bold-table m-2">Dettagli dell'ordine</div>
                    <div class="row">
                        <div
                            class="col-md-4 d-none d-xs-none d-sm-none bold-table"
                        >
                            PIATTO
                        </div>
                        <div
                            class="col-md-4 d-none d-xs-none d-sm-none bold-table"
                        >
                            AGGIUNTA
                        </div>
                        <div
                            class="col-md-2 d-none d-xs-none d-sm-none bold-table"
                        >
                            QUANTITA'
                        </div>
                        <div
                            class="col-md-2 d-none d-xs-none d-sm-none bold-table"
                        >
                            PREZZO
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-md-4">
                            @foreach ($order->plate as $plate )
                            <div>{{ $plate->name }}</div>
                            @endforeach
                        </div>
                        <div class="col-5 col-md-4">{{ $order->details }}</div>
                        <div class="col-5 col-md-2">
                            @foreach ($order->plate as $plate )
                            <div>{{$plate->pivot->quantity}}</div>
                            @endforeach
                        </div>
                        <div class="col-5 col-md-2">
                            @foreach ($order->plate as $plate )
                            <div class="text-right">
                                € {{ number_format ( $plate->price, 2) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 col-md-10 bold-table">TOTALE:</div>
                        <div class="col-2 col-md-2">
                            <div class="bold-table text-right">
                                € {{ number_format($order->total_price, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            @endforeach
        </div>
    </div>
</div>

@endsection
