{{-- resources/views/products/edit.blade.php --}}

@extends('layouts.base')

@section('content')

<div class="container mt-5">
<form action="/products/{{ $product['id'] }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $product['title'] }}">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product['price'] }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $product['description'] }}</textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category" value="{{ $product['category'] }}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" id="image" name="image" value="{{ $product['image'] }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
    <a href="/products/{{ $product['id'] }}" class="btn btn-secondary mt-3">Back to Product</a>
</div>

@stop
