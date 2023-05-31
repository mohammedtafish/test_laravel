<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {



    return view('home',[
        'posts_all'=>post::all()
    ]);
});



Route::get('post/{post}', function ($slug) {

     return view('post',['post'=>post::find($slug)]);


})->where('{post}','[a-zA-Z0-9_-/]');
