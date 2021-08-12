<?php

use App\Http\Controllers\DatabaseController;
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
     return view('layout');
 });

 Route::get('/todo', function () {
    return view('todo.todo');
});

// Route::get('/name/{id}', [DatabaseController::class, 'show', function($id) {
//     return view('database.show');
// }]);

Route::resource('database', DatabaseController::class);

Route::put('database/update/{database}', [DatabaseController::class, 'updateTime'])->name('database.update-time');

