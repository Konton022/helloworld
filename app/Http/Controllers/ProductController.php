<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
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
}
