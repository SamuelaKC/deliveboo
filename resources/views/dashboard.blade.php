@extends('layouts.app') 


@section('content')
<div class="dashboard">
    <aside class="col-2 d-none d-md-block">a</aside>
    <div class="col">
        <h1 class="dashboard-welcome">Benvenuto {{ $user->name }}</h1>
        <h4>Questa è la tua Dashboard per la gestione della tua attività</h4>
        <a href="{{ route('users.edit', $user) }}">
            <button class="btn btn-primary">Modifica i tuoi dati</button>
        </a>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            <button class="btn btn-primary">Resetta Password</button>
        </a>
        <a class="btn btn-link" href="{{ route('plates.index') }}">
            <button class="btn btn-primary">I tuoi piatti</button>
        </a>
        <a class="btn btn-link" href="{{ route('orders.index') }}">
            <button class="btn btn-primary">I tuoi ordini</button>
        </a>
    </div>
    <aside class="col-2 d-none d-md-block">
        <!-- to do image -->
        <img
            src="{{ asset('storage/' . $user->picture) }}"
            alt="Foto profilo {{ $user->name }}"
        />
    </aside>
</div>
@endsection
