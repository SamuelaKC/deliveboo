@extends('layouts.app') @section('content')
    <div class="dashboard text-center">

        <div class="dashboard-img">
            <img src="/image/panino.jpg" alt="Foto profilo {{ $user->name }}" />

            <div class="hover-img">
                <a href="{{ route('users.editimg', $user) }}">

                    <button class="btn btn-sm">Modifica</button>
                </a>
            </div>
        </div>

        <div class="container">
            <h1 style="border-bottom: 1px solid black" class="font-header">{{ $user->name }}</h1>
            <div>
                {{-- {{ $category-> }} --}}
            </div>
        </div>


        <div class="dashboard-img p-5">
            <img src="{{ $user->picture }}" alt="Foto profilo" />
        </div>

        <br>

        <div style="border-top: 1px solid black" class="container">

            <br>

            <h4>Questa è la tua Dashboard per la gestione della tua attività</h4>
            <div class=" container col-4">
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
                <a class="dropdown-item" href="{{ route('static.index') }}">
                    <i class="bi bi-bar-chart-line"></i> Statistiche ristorante
                </a>
                <a class="dropdown-item" href="{{ route('password.request') }}">
                    <i class="bi bi-x-square"></i> Resetta Password
                </a>

            </div>
        </div>
    </div>
@endsection
