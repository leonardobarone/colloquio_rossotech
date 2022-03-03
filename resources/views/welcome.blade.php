@extends('layouts.front')

@section('content')

    <div id="hero">
        <div class="container">
           <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <h1>Rossotech</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea obcaecati veritatis eligendi deserunt nihil ut, molestias perferendis necessitatibus autem nisi mollitia voluptatum sit consectetur qui dicta, tempore unde. Velit, doloremque!</p>
                    <a class="btn-white" href="{{route('categories')}}">Vedi tutte le nostre categorie</a>
                </div>
           </div>
        </div>
    </div>

@endsection