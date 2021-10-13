@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                <div class="col">
                    <div class="font-login">
                        Diventa subito partner di Deliveboo
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="">
                            <label for="name" class="text-md-right"></label>
                            <div class="col">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    placeholder="Nome del Ristorante"
                                    autofocus
                                />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="address" class="text-md-right"></label>
                            <div class="col">
                                <input
                                    id="address"
                                    type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address"
                                    value="{{ old('address') }}"
                                    required
                                    autocomplete="address"
                                    placeholder="Indirizzo, numero civico, Cap Paese Provincia"
                                    autofocus
                                />
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="email" class="text-md-right"></label>
                            <div class="col">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="Indirizzo email"
                                />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="password" class="text-md-right"></label>
                            <div class="col">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="La tua password"
                                />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="password-confirm"
                                class="text-md-right"
                            ></label>
                            <div class="col">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Conferma password"
                                />
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="phone_number"
                                class="text-md-right"
                            ></label>
                            <div class="col">
                                <input
                                    id="phone_number"
                                    type="tel"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    name="phone_number"
                                    value="{{ old('phone_number') }}"
                                    required
                                    autocomplete="phone_number"
                                    placeholder="Cellulare (+39...)"
                                    autofocus
                                />
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="piva" class="text-md-right"></label>
                            <div class="col">
                                <input
                                    id="piva"
                                    type="text"
                                    class="form-control @error('piva') is-invalid @enderror"
                                    name="piva"
                                    value="{{ old('piva') }}"
                                    required
                                    autocomplete="piva"
                                    placeholder="Partita Iva"
                                    autofocus
                                />
                                @error('piva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="description"
                                class="text-md-right"
                            ></label>
                            <div class="col">
                                <textarea
                                    id="description"
                                    type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description"
                                    value="{{ old('description') }}"
                                    required
                                    autocomplete="description"
                                    placeholder="Descrizione del ristorante"
                                    autofocus
                                ></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="container">
                            <div class="row py-2">
                                <div class="col">
                                    <button
                                        type="submit"
                                        class="btn btn-bluegreen"
                                    >
                                        Registrati
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col terms">
                            Cliccando "Registrati" dichiari di aver letto e
                            compreso i
                            <a href="#"
                                >termini e condizioni di Deliveboo per i
                                ristoranti</a
                            >.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">qui ci va l'immagine</div>
    </div>
</div>
@endsection
