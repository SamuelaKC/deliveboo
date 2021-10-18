@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        {{-- @dd($monthsName) 
                    @dd($monthsNo) 
                    @dd($priceAll)  --}}

        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard prova</div>
                <div class="panel-body">
                    <div id="container" style="width: 75%;">
                        <chart
                            labels="{{ json_encode($monthsName) }}"
                            data-prop="{{ json_encode($priceAll) }}"
                        >
                        </chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
