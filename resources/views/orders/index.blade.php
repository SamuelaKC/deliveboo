@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @foreach ($orders as $order)
            <div class="row">
                <div class="col">
                    <div>Nome: {{ $order->name_surname }}</div>
                    <div>Indirizzo: {{ $order->address }}</div>
                    <div>Numero di Telefono: {{ $order->phone_number }}</div>
                    <div>Dettagli dell'ordine: </div>
                    <div>Ordine:</div>
                    <div class="row">
                        <div class="col-5 bold-table">PIATTO</div>
                        <div class="col-4 bold-table">AGGIUNTA</div>
                        <div class="col-2 bold-table">QUANTITA'</div>
                        <div class="col-1 bold-table">PREZZO</div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            @foreach ($order->plate as $plate )
                            <div class="col">
                                <div>{{ $plate->name }}</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-4">{{ $order->details }}</div>
                        <div class="col-2">
                            @foreach ($order->plate as $plate )
                            <div class="col">
                                <div>{{$plate->pivot->quantity}}</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-1">
                            @foreach ($order->plate as $plate )
                            <div class="col text-right">
                                <div>
                                    {{ number_format ( $plate->price, 2) }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 bold-table">TOTALE:</div>
                        <div class="col-2">
                            <div class="col">
                                <div class="bold-table text-right">
                                    {{ number_format($order->total_price, 2) }}
                                </div>
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
