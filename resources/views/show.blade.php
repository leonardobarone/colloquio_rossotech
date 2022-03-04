@extends('layouts.front')

@section('content')
    <div id="show" class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="https://picsum.photos/id/1/400/200" alt="">
            </div>
            <div class="col-12 col-md-6">
                <h1>{{$risp['name']}}</h1>
                    @foreach ($item['features'] as $key => $it)
                        {{-- @if(count($it) > 1)
                        @endif --}}
                        <h6><strong>{{$key}}:</strong><em>{{}}</em></h6>
                        
                    @endforeach
            </div>
        </div>
    </div>
@endsection