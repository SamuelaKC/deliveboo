@extends('layouts.app') @section('content')
<div class="dashboard">
    <aside class="col-2 d-none d-md-block">a</aside>
    <div class="col">
        <h1 class="font-header">Benvenuto {{ $user->name }}</h1>
        <h4>Questa è la tua Dashboard per la gestione della tua attività</h4>
        <div class="col-4">
            <a class="dropdown-item" href="{{ route('users.edit', $user) }}">
                <i class="bi bi-pencil"></i> Modifica i tuoi dati
            </a>
            <a class="dropdown-item" href="{{ route('plates.index') }}">
                <i class="bi bi-list-ul"></i> I tuoi piatti
            </a>
            <a class="dropdown-item" href="{{ route('plates.create') }}">
                <i class="bi bi-file-earmark-plus"></i> Aggiungi un piatto
            </a>
            <a class="dropdown-item" href="{{ route('orders.index') }}">
                <i class="bi bi-list-ul"></i> I tuoi ordini
            </a>
            {{-- <a class="dropdown-item" href="{{ route('plates.static') }}">
                <i class="bi bi-bar-chart-line"></i> Statistiche ristorante
            </a> --}}
            <a class="dropdown-item" href="{{ route('password.request') }}">
                <i class="bi bi-x-square"></i> Resetta Password
            </a>
            
        </div>
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
