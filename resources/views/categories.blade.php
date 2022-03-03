@extends('layouts.front')

@section('content')
    <div id="categories" class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-12 col-md-3">
                    <div class="category_card">
                        <h3>{{$category['category_id']}}) {{$category['name']}}</h3>
                        <a class="btn" href="{{route('code', $category['category_id'])}}">Vai alla categoria</a>    
                    </div>     
                </div>
            @endforeach
        </div>
    </div>
@endsection