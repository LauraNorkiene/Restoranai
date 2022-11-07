<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth','administrator'])->group(function(){
Route::resources([
    'restaurant'=> RestaurantController::class,
    'dishes'=> DishController::class
]);
Route::get('restaurant/{id}/dishes',[DishController::class, 'restaurantDishes'])->name('restaurantDishes');
});

Route::get('/image/{name}',[DishController::class, 'display'])
    ->name('image.dishes')
    ->middleware('auth');
Route::resource('images', ImageController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
