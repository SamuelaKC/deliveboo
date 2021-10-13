@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        
        @foreach ($plates as $plate)
        <div class="col-4 plate">
            <div class="card-body">
                <div>Name: {{ $plate->name }}</div>
                <div>Description:{{ $plate->description }}</div>
                <div>Price: {{ $plate->price }}</div>
                <div>Disponibilità: {{ $plate->available }}</div>
                <div>Picture: {{ $plate->picture }}</div>
            </div>
        </div>
        @endforeach

        <img src="/image/add.jpg" width="80px" height="80px" style="cursor:zoom-in" onclick="document.getElementById('box').style.display='block'">
        <div id="box" class="w3-modal">
            <div class="w3-modal-content">
                <header class="w3-container w3-red">
                    <span onclick="document.getElementById('box').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2>Ingredienti</h2>
                </header>
                <div class="w3-container">
                {{-- @foreach ($ingredients as $ingredient)
                    <div>{{ $ingredient->name }}</div>
                @endforeach --}}
                </div>
                {{-- <footer class="w3-container w3-red">
                    <p>Copyright 2019</p>
                </footer> --}}
            </div>
        </div>
    </div>
</div>

@endsection
