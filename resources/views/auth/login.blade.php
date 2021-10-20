@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1 class="font-header title-form text-center">
                    Accedi
                </h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-bluegreen">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn link-bluegreen" href="{{ route('password.request') }}">
                                        {{ __('Password dimentica?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="logo-login text-center">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="80px"
                        viewBox="0 0 300 80" enable-background="new 0 0 300 80" xml:space="preserve">
                        <image id="image0" width="300" height="80" x="0" y="0" href="data:image/png;base64,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" />
                    </svg>

                </div>
            </div>
        </div>
    </div>
@endsection
