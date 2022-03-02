<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function categories()
    {
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
        ->get('https://stage.tuscanyleather.it/api/v1/categories');
        $data = $response->json();
        $categories = $data['response'];
        return view('categories', compact('categories'));
    }
    public function code($id)
    {
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
        ->get('https://stage.tuscanyleather.it/api/v1/categories');
        $data = $response->json();
        $categories = $data['response'];
        $category = null;
        for ($i = 0; $i < count($categories); $i++) {
            if($categories[$i]['category_id'] == intval($id)){
                $category = $categories[$i];
            }
        }
        
        $products = $category['products'];
        $tlsArray = [];
        foreach($products as $product) {
            $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
            ->get("https://stage.tuscanyleather.it/api/v1/product-info/?code={$product}");
            $data = $response->json();
            $tls = $data['response'];
            array_push($tlsArray, $tls);
        }
        dd($tlsArray);

     

        return view('code', compact('category'));
    }
    public function show()
    {
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
        ->get('https://stage.tuscanyleather.it/api/v1/product-info/?code=TL141727');
        $data = $response->json();
        $item = $response['response'];
        dump($item);
        return view('show', compact('item'));
    }
}


