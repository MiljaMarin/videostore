<?php


use Illuminate\Support\Facades\Route as Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthorsController;


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
    return view('start');
});

/*
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
*/

Auth::routes();


Route::get('/greeting/{name?}', [TestController::class, 'greetings'])->name('greeting');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos', [TodoController::class, 'index'])->name('todos');
Route::get('/todos/{id}', [TodoController::class, 'show'])->name('todos.show');

Route::get('/authors', [AuthorsController::class, 'index'])->name('authors');
Route::get('/authors/{id}', [AuthorsController::class, 'show'])->name('authors.show');

//Route::get('/todos/edit/', [TodoController::class, 'create'])->name('todos.create')->middleware('auth');
//Route::get('/todos/edit/', [TodoController::class, 'edit'])->name('todos.edit');


// todos verändern, anlegen, löschen
$routeParams = [
    'middleware' => 'auth',
    'prefix' => 'todos'
];

$routeFunction = function($route) {
    $route->get('/create', [TodoController::class, 'create'])->name('todos.create');
    $route->post('/store', [TodoController::class, 'store'])->name('todos.store');
    $route->get('/edit/{id}', [TodoController::class, 'edit'])->name('todos.edit');
    $route->post('/update/{id}', [TodoController::class, 'update'])->name('todos.update');
    $route->get('/destroy/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
};
Route::group($routeParams, $routeFunction);

// authors verändern, anlegen, löschen
$routeParams = [
    'middleware' => 'auth',
    'prefix' => 'authors'
];

$routeFunction = function($route) {
    $route->get('/create', [AuthorsController::class, 'create'])->name('authors.create');
    $route->post('/store', [AuthorsController::class, 'store'])->name('authors.store');
    $route->get('/edit/{id}', [AuthorsController::class, 'edit'])->name('authors.edit');
    $route->post('/update/{id}', [AuthorsController::class, 'update'])->name('authors.update');
    $route->get('/destroy/{id}', [AuthorsController::class, 'destroy'])->name('authors.destroy');
};
Route::group($routeParams, $routeFunction);

/*
Route::group ([
    'middleware' => 'auth',
    'prefix' => 'todos'
]), function($route) {
$route->get('/create', [TodoController::class, 'create'])->name('todos.create');
    $route->get('/edit/{id}', [TodoController::class, 'create'])->where(['id' => '[0-9]+'])->name('todos.create');
    $route->post('/store', [TodoController::class, 'store'])->name('todos.store');
    $route->post('/update/{id}', [TodoController::class, 'update'])->where(['id' => '[0-9]+'])->name('todos.update');
    $route->get('/destroy/{id}', [TodoController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('todos.destroy');
}
 */

// Wenn eine Route aufgerufen wird, die nicht defniert wurde
Route::fallback(function ()
{
    return 'Route nicht gefunden';
});
