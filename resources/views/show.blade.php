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
                        <h3><strong>{{$key}}:</strong></h3>
                        <ul>
                            @foreach ($it as $i)
                            <li>{{$i}}</li>
                            @endforeach
                        </ul>
                        
                    @endforeach
            </div>
        </div>
    </div>
@endsection