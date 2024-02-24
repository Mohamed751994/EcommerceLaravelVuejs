<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\JoinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\ProductController;
Use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Str;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/migrate', function (){
    \Illuminate\Support\Facades\Artisan::call('migrate');
  //  \Illuminate\Support\Facades\Artisan::call('db:seed');
    return 'Migrated Successfully';
});
//
//Route::get('/slugs', function (){
//
//    foreach (\App\Models\Product::get() as $p)
//    {
//        $string = trim($p->name);
//
//        $string = mb_strtolower($p->name, "UTF-8");;
//
//        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
//
//        $string = preg_replace("/[\s-]+/", " ", $string);
//
//        $string = preg_replace("/[\s_]/", '-', $string);
//        \App\Models\Product::whereId($p->id)->update(['slug'=>$string]);
//    }
//    return ' Successfully';
//});

// Route::apiResource('categories', 'App\Models\Category', ['GET', 'PUT', 'POST', 'DELETE']);
Route::post('/categories', [CategoryController::class, 'create_new_category']);
Route::get('/categories', [CategoryController::class, 'get_all_categories']);
Route::get('/category/{id}', [CategoryController::class, 'get_single_category']);

Route::get('/products', [ProductController::class, 'get_all_products']);
Route::get('/product/{id}/{slug}', [ProductController::class, 'get_single_product']);

Route::get('/blogs', [BlogController::class, 'get_all_blogs']);
Route::get('/blog/{slug}', [BlogController::class, 'get_single_blog']);


Route::post('/invoice', [InvoiceController::class, 'create_new_invoice']);
Route::get('/invoices', [InvoiceController::class, 'get_all_invoices']);
Route::get('/invoice/{id}', [InvoiceController::class, 'get_single_invoice']);

//join us
Route::post('/join', [JoinController::class, 'join']);
