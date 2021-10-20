@extends('layouts.app') @section('content')
<div class="container-fluid">
    {{-- @dd($monthsName) 
                    @dd($monthsNo) 
                    @dd($priceAll)  --}}
    <div class="row justify-content-center">
        <div class="col-12  m-3"><h1 class=" font-header">Le tue statistiche</h1></div>
            <div class="col-12 col-md-10">
                <chart
                    labels="{{ json_encode($monthsName) }}"
                    data-prop="{{ json_encode($priceAll) }}"
                >
                </chart>
            </div>
    </div>
</div>
@endsection
