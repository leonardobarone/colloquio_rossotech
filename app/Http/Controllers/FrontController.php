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
        
        
        $tlsArray = [];
        
        if (array_key_exists('products', $category )) {

            $products = $category['products'];

            foreach($products as $product) {
                $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
                ->get("https://stage.tuscanyleather.it/api/v1/product-info/?code={$product}");
                $data = $response->json();
                $tls = $data['response'];
                array_push($tlsArray, $tls);
            }

            } else {
                $tlsArray = [];
            }

        
       
        // dump($tlsArray);

     

        return view('code', compact('category', 'tlsArray'));
    }
    public function show($code)
    {

        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
        ->get("https://stage.tuscanyleather.it/api/v1/product-info/?code={$code}");
        $data = $response->json();
        $item = $response['response'];

        
        // totale tl
        $firstItem = $item['items'][0];
        // dump($item);

        // primo sku
        $risposta = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3N0YWdlLnR1c2NhbnlsZWF0aGVyLml0L2FwaS92MS9yZWZyZXNoLXRva2VuIiwiaWF0IjoxNjM3OTkzMjY0LCJleHAiOjE5NTMzNTMyNjQsIm5iZiI6MTYzNzk5MzI2NCwianRpIjoiNmVTZkdWakdkYU10eGl6RCIsInN1YiI6MjAwNDgwLCJwcnYiOiIwZTY1ZmVjYWM0NTI5M2Q4ZmRmYzViMzBmMTA4ZDQwNWYwYTVjZGI2In0.ymezOpO2KATXDjLEJ4bub17ifEUT9fFeRhLsaDcL7KY')
        ->get($firstItem['details_endpoint']);
        $data = $risposta->json();
        $risp = $data['response'];
        // dump($risp);

        dump($item);
        dump($risp);
        return view('show', compact('item', 'risp'));
    }
}


