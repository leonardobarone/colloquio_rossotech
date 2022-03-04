@extends('layouts.front')

@section('content')
<div id="code" class="container">
    <div class="row">
        <div class="col-12">
            <h1> {{ $category['name'] }}</h1>  
        </div>
        @if (empty($tlsArray))
            <div class="col-12">
                <p>Questa categoria non contiene nessun prodotto!!</p> 
            </div>        
        @else
                @foreach ($tlsArray as $key => $item)
                    <div class="col-12 col-md-4">
                        <a href="{{ route('show', $item['code'])}}">
                            {{$item['giftwrap_type']}} N° {{$key + 1}}
                            
                        </a> 
                    </div>
                @endforeach   
        @endif
    </div>
</div>
@endsection