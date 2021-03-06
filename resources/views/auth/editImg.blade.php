@extends('layouts.app') @section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                <div class="col">
                    <h1 class="font-header title-form">Carica la tua foto</h1>
                    <form
                        method="POST"
                        action="{{ route('users.updateimg', $user) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('PUT')

                        <div>
                            <div class="">
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
                            </div>
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