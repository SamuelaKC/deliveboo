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
        </div>
        <aside class="col-2 d-none d-md-block">d</aside>
    </div>
@endsection