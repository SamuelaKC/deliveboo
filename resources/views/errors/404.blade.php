@extends('layouts.app') @section('content')

<div class="container p-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-4">
            <img
                src="storage/image/logo/deliveboo_sorry1.svg"
                alt="Logo Deliveboo Sorry"
                class="svg-color-yellow"
            />
        </div>
        <div class="col-8">
            <h1>
                Ops! It's the wrong route!
                <a class="" href="{{ route('home') }}">{{
                    __("Turn Back!")
                }}</a>
            </h1>
        </div>
    </div>
</div>

@endsection
