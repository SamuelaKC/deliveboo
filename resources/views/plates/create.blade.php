
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div style="padding: 25px" class="container plates-container">

        <form action="{{ route('plates.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </div>
    
            <div class="form-group">
                <label for="available">Disponibile : </label>
                <input type="checkbox" id="available" name="available" checked="true">
            </div>
    
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" name="price" id="price">
            </div>
    
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="text" name="picture" id="picture">
            </div>
    
            <div class="form-group">
                <button type="submit">Crea piatto</button>
    
            </div>
    
    
        </form>
    
    </div>
</div>
@endsection