<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('main');
});

Route::prefix('products')->group( function(){
    
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
}); 

Route::resource('articles', ArticleController::class);