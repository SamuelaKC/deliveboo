@extends('layouts.app') @section('content')
<div class="container p-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-4">
            <img
                src="/image/logo/deliveboo_angry1.svg"
                alt="Logo Deliveboo Angry"
                class="svg-color-red"
            />
        </div>
        <div class="col-8"><h1>Qui non puoi passare!</h1></div>
    </div>
</div>

<div class="container p-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-4">
            <img
                src="/image/logo/deliveboo_sorry1.svg"
                alt="Logo Deliveboo Sorry"
                class="svg-color-yellow"
            />
        </div>
        <div class="col-8"><h1>Mi spiace, qui non puoi entrare!</h1></div>
    </div>
</div>

@endsection
