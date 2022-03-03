@extends('layouts.front')

@section('content')
<div class="container">
    <ul>
        <h1> {{ $category['name'] }}</h1>  
        @if (empty($tlsArray))
            <p>Questa categoria non contiene nessun prodotto!!</p>         
        @endif
        @foreach ($tlsArray as $key => $item)
        <li>
           <a href="{{ route('show', $item['code'])}}">
            {{$item['giftwrap_type']}} {{$item['code']}}
           </a> 
        </li>
        @endforeach
    </ul>
</div>
@endsection