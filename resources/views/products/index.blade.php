{{-- resources/views/products/index.blade.php --}}

@extends('layouts.base')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
    </div>
<div class="container mt-5">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <a href="{{ route('products.show', $product['id']) }}" class="card h-100 shadow p-3 mb-5 bg-white rounded hover-shadow">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['title'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product['title'] }}</h5>
                        <p class="card-text flex-grow-1">{{ $product['category'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">${{ $product['price'] }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@stop
