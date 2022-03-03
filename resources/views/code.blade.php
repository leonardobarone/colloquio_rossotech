@extends('layouts.front')

@section('content')
<div class="container">
    <ul>
        @foreach ($tlsArray as $key => $item)
        <li>
           <a href="{{ route('show', $item['code'])}}">
            {{$item['giftwrap_type']}} {{$item['code']}}
           </a> 
        </li>
        @endforeach
    </ul>
        {{ $category['name'] }}
</div>
@endsection