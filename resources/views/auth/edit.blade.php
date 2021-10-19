@extends('layouts.app') @section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                <div class="col">
                    <h1 class="font-header title-form">Modifica i tuoi dati</h1>
                    <form
                        method="POST"
                        action="{{ route('users.update', $user) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('PUT')

                        <div>
                            <label for="name" class="text-md-right"></label>
                            <div>
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ $user->name }}"
                                    required
                                    autocomplete="name"
                                    autofocus
                                />

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="address" class="text-md-right"></label>

                            <div>
                                <input
                                    id="address"
                                    type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address"
                                    value="{{ $user->address }}"
                                    required
                                    autocomplete="address"
                                    autofocus
                                />

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label
                                for="phone_number"
                                class="text-md-right"
                            ></label>

                            <div>
                                <input
                                    id="phone_number"
                                    type="tel"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    name="phone_number"
                                    value="{{ $user->phone_number }}"
                                    required
                                    autocomplete="phone_number"
                                    autofocus
                                />
                                
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="piva" class="text-md-right"></label>

                            <div>
                                <input
                                    id="piva"
                                    type="text"
                                    class="form-control @error('piva') is-invalid @enderror"
                                    name="piva"
                                    value="{{ $user->piva }}"
                                    required
                                    autocomplete="piva"
                                    autofocus
                                />

                                @error('piva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label
                                for="description"
                                class="text-md-right"
                            ></label>

                            <div>
                                <textarea
                                    id="description"
                                    type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description"
                                    required
                                    autocomplete="description"
                                    autofocus
                                    >{{ $user->description }}</textarea
                                >

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Scelta tag: -->
                        <div class="mt-3">
                            <label
                                for="tag[]"
                                class="text-md-right"
                            >Scegli i tui tag:</label>
                            <div class="row">
                               
                                @foreach($tags as $tag)
                                <div class="col-6 col-sm-4 col-lg-3">
                                    <input name="tags[]" id="tag" value="{{ $tag->id }}" type="checkbox"
                                        @foreach ($user->tag as $tagUser)
                                            @if ($tagUser->id === $tag->id)
                                                {{ 'checked' }}
                                            @endif
                                        @endforeach
                                    > {{ $tag->name }} <br>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>

                        <div>
                            {{-- <div class="d-none">
                                <label
                                    for="pictureFile"
                                    class="text-md-right"
                                ></label>
                                <input
                                    id="pictureFile"
                                    type="file"
                                    class="form-control @error('pictureFile') is-invalid @enderror"
                                    name="pictureFile"
                                    required
                                    autocomplete="pictureFile"
                                    autofocus
                                />

                                @error('pictureFile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="container">
                            <div class="row py-2">
                                <div class="col">
                                    <button
                                        type="submit"
                                        class="btn btn-bluegreen"
                                    >
                                        Modifica
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
