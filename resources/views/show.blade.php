@extends('layouts.front')

@section('content')
    <div id="show" class="container">
        <div class="row">
            <div id="top-left" class="col-12 col-md-6">
                <img src="https://picsum.photos/id/1/400/200" alt="">
            </div>
            <div id="top-right" class="col-12 col-md-6">
                <h1>{{$risp['name']}}</h1>
                <div class="price">{{$risp['prices']['currency']}} {{$risp['prices']['list']['default']}}</div>
                <div class="color">{{$risp['color']}}</div>
            </div>
            <div id="bottom-left" class="col-12 col-md-6">

            </div>
            <div id="bottom-right" class="col-12 col-md-6">
                @foreach ($item['features'] as $key => $it)
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