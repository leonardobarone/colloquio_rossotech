@extends('layouts.front')

@section('content')
    <ul>
        @foreach ($categories as $category)
        <a href="{{route('code', $category['category_id'])}}"><li> {{ $category['name'] }} {{ $category['category_id']}}</li></a>     
        @endforeach
    </ul>
@endsection