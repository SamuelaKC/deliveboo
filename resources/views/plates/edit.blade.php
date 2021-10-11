@extends('layouts.app')

@section('content')
<div class="container ">
    <a href="{{route('plates.index')}}"><button type="button"  class="btn btn-secondary"><- Torna indietro</button></a>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('plates.update', $plate)}}" method="POST" enctype="multipart/form-data">
    
            @csrf
            @method('PUT')

            <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria">
                    <option></option>
                    @foreach($categories as $category) 
                    <option value="">{{ $category->name }}</option>
                    @endforeach
                </select>
            <div class="">
                <label for="name">Nome: </label>
                <input type="text" name="name" id="name" value="{{ $plate->name }}">
            </div>
            
            <div>
                <label for="description">Descrizione: </label>
                <input type="text" name="description" id="description" value="{{ $plate->description }}">
            </div>

            <div>
                <label for="price">Prezzo: </label>
                <input type="text" name="price" id="price" value="{{ $plate->price }}">
            </div>

            <div>
                <span>Disponibilità: </span> 
                <input type="checkbox" name="available" id="available">
            </div>

            <div>
                <span>Inserisci l'url della tua foto: </span> 
                <input type="text" name="picture" id="picture">
            </div>

            <div>
                <input class="btn btn-primary" type="submit" value="Invia"> 
            </div>

        </form>
        
</div>
@endsection