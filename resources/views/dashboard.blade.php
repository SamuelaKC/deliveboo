@extends('layouts.app') @section('content')
    <div class="dashboard py-5">

        <div class="container">
            <h1 class="font-header text-center dashboard-title">{{ $user->name }}</h1>

        </div>


        <div class="dashboard-img-container">
            <div class="dashboard-img">
                <img src="{{ asset('storage/' . $user->picture) }}" alt="Foto profilo" />
                <div class="hover-img">
                    <a href="{{ route('users.editimg', $user) }}">

                        <button class="btn btn-sm text-center">Modifica</button>
                    </a>

                </div>
                <div class="dashboard-tag">
                    @foreach ($user->tag as $tag)
                        <span>#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container mt-4 mb-2">

            <h2 class="text-center">Gestisci la tua attività</h2>
            <div class="row justify-content-center mt-3">
                <div class="col-8 col-md-5 col-lg-3">

                    <div>

                        <a class="dashboard-link" href="{{ route('users.edit', $user) }}">
                            <i class="bi bi-pencil"></i> Modifica i tuoi dati
                        </a>
                    </div>
                    <div>

                        <a class="dashboard-link" href="{{ route('plates.index') }}">
                            <i class="bi bi-list-ul"></i> I tuoi piatti
                        </a>
                    </div>
                    <div>

                        <a class="dashboard-link" href="{{ route('plates.create') }}">
                            <i class="bi bi-file-earmark-plus"></i> Aggiungi un piatto
                        </a>
                    </div>
                    <div>

                        <a class="dashboard-link" href="{{ route('orders.index') }}">
                            <i class="bi bi-list-ul"></i> I tuoi ordini
                        </a>
                    </div>
                    <div>

                        <a class="dashboard-link" href="{{ route('static.index') }}">
                            <i class="bi bi-bar-chart-line"></i> Statistiche ristorante
                        </a>
                    </div>
                    <div>

                        <a class="dashboard-link" href="{{ route('password.request') }}">
                            <i class="bi bi-x-square"></i> Resetta Password
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
