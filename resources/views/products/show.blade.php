{{-- resources/views/products/show.blade.php --}}

@extends('layouts.base')

@section('content')

<div class="container mt-5">
    <div class="card mb-3 p-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $product['image'] }}" class="img-fluid rounded-start" alt="{{ $product['title'] }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['title'] }}</h5>
                    <p class="card-text">{{ $product['description'] }}</p>
                    <p class="card-text"><small class="text-muted">$ {{ $product['price'] }}</small></p>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-end gap-3">
            <a href="{{route('products.edit', $product['id'])}}" class="btn btn-primary">Edit</a>
            <form action="{{route('products.destroy', $product['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="/cart" class="btn btn-success">Add to cart</a>
        </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/products" class="btn btn-secondary">Back to Products</a>
</div>

@stop
