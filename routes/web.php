<?php


use Illuminate\Support\Facades\Route as Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;

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


Route::get ('/mara', function() {
    return '<h1>Hallo Mara</h1>';
});


Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('name/{name?}', function ($name = null) {
    return '<h1>Mein Name ist ' . $name .'<h1>';
});


Route::get('name/{name?}', function ($name = 'Mara') {
    return '<h1>Mein Name ist ' . $name .'<h1>';
});



Route::get('name/{id}/{user?}', function ($id, $user = null) {
    return "<h1>ID: &nbsp &nbsp $id <br> User: $user </h1>";
})->where(['id' => '[0-9]+', 'user' => '[A-Za-z]+']);


// view ruft die Seite auf, ähnlich wie require bei php
Route::get('/greeting/{name?}', function ($name = null) {
    return view('greeting', ['name' => $name]);
});


Auth::routes();

Route::get('/greeting/{name?}', [TestController::class, 'greetings'])->name('greeting');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/todos', [TodoController::class, 'index'])->name('todos');
Route::get('/todos/{id}', [TodoController::class, 'show'])->name('todosShow');
Route::get('/todos/edit/{id}', [TodoController::class, 'edit'])->name('todosEdit');

// Wenn eine Route aufgerufen wird, die nicht defniert wurde
Route::fallback(function ()
{
    return 'Route nicht gefunden';
});
