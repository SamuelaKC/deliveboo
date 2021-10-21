@extends('layouts.app') @section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12  m-3">
            <h1 class="font-header title-form">I tuoi ordini</h1>
        </div>

        <div class="col-10">
            @foreach ($orders as $order)
            <div class="row justify-content-center">
                <div class="col mb-5">
                    <div class="bold-table m-t-2">Dettagli cliente</div>
                    <div>Nome: {{ $order->name_surname }}</div>
                    <div>Indirizzo: {{ $order->address }}</div>
                    <div>Numero di Telefono: {{ $order->phone_number }}</div>
                    <div class="bold-table m-t-2">
                        Dettagli dell'ordine
                    </div>
                    <div class="m-2">
                        Dettagli ordine: {{ $order->details }}
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2 d-none d-md-block  bold-table">
                            Q.TA'
                        </div>
                        <div class="col-md-7 d-none d-md-block  bold-table">
                            PIATTO
                        </div>
                        <div class="col-md-2 d-none d-md-block  bold-table">
                            PREZZO
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-1 col-md-2">
                            @foreach ($order->plate as $plate )
                            <div>{{$plate->pivot->quantity}}</div>
                            @endforeach
                        </div>
                        <div class="col-6 col-md-7 text-nowrap">
                            @foreach ($order->plate as $plate )
                            <div>{{ $plate->name }}</div>
                            @endforeach
                            @foreach ($order->plate as $plate )
                            <div>{{$plate->pivot->addition}}</div>
                            @endforeach
                        </div>
                        <div class="col-4 col-md-2 border-bottom">
                            @foreach ($order->plate as $plate )
                            <div class="text-right">
                                € {{ number_format ( $plate->price, 2) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center border-bottom">
                        <div class="col-8 col-md-9 bold-table">
                            TOTALE:
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="bold-table text-right">
                                € {{ number_format($order->total_price, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
