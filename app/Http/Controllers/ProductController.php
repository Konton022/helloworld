<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use function Laravel\Prompts\info;

class ProductController extends Controller
{
    public function index(){   
        try {
    $response = json_decode(file_get_contents('https://fakestoreapi.com/products'), true);
    $products = $response;
        } catch (\Exception $e) {
            // Handle exception here
        }

        return view('products/index', [
            'products'=> $products
        ]);
    }
    public function show($id) {
        try {
            $response = json_decode(file_get_contents('https://fakestoreapi.com/products/'.$id), true);
            $product = $response;

        } catch (\Exception $e) {
            
        }

        return view('products/show', [
            'product'=> $product
        ]);
    }
    public function edit($id) {
        try {
            $response = json_decode(file_get_contents('https://fakestoreapi.com/products/'.$id), true);
            $product = $response;
        } catch (\Exception $e) {
            // Handle exception here
        }
        return view('products/edit', [
            'product'=> $product
        ]);
    }

    public function store(Request $request) {
        $requestData = $request->all();
        $data = json_encode($requestData);
        // dd($data);
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->post('https://fakestoreapi.com/products', $requestData);
            $result = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            // Handle exception here
        }

        return redirect('/products');
    }

    public function create(){

        return view('products/create');
    }

    public function destroy($id) {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->delete('https://fakestoreapi.com/products/'.$id);
            $result = json_decode($response->getBody()->getContents());

            // dd($result);
        } catch (\Exception $e) {
            // Handle exception here
        }
        return redirect('/products');
    }

    public function update(Request $request, $id) {
        $requestData = $request->all();
        $data = json_encode($requestData);
        // dd($data);
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->put('https://fakestoreapi.com/products/'.$id, $requestData);
            $result = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            // Handle exception here
        }
        return redirect('/products');
    }
}
