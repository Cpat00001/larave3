<?php

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

Route::view('/', 'home')->name('home');
Route::view('/contact', 'contact')->name('contact');
Route::get('/post/{id}/{num}', function ($id, $num) {

    $section = [
        1 => ['tytul' => 'motoryzacja'],
        2 => ['tytul' => 'lotnictwo']
    ];
    $author = [
        1 => ['author' => 'Romek'],
        2 => ['author' => 'Patryk']
    ];

    return view('blog-post', ['section' => $section[$id], 'name' => $author[$num]]);
})->name('blog-post');
