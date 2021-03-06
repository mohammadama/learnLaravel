<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

Route::view('/',[HomeController::class,'home'])->name('home.index');
route::view('/contact',[HomeController::class,'contact'])->name('home.contact');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true ,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ],
    3 => [
        'title' => 'Intro to js',
        'content' => 'This is a short intro to js',
        'is_new' => false
        
    ]
];

// Route::get('/posts' , function() use($posts){
//     return view('posts.index' , ['posts' => $posts]);
// });

Route::get('/posts/{id}', function ($id) use($posts) {

    abort_if(!isset($posts[$id]), 404 );

    return view('posts.show' , ['post' => $posts [$id]]);
})-> name('posts.show');

Route::get('/recend-posts/{days_ago?}', function ($daysAgo = 20 ) {
    return 'Posts from' . $daysAgo . 'daysAgo';
})->name('posts.recend.index');

// responses , headers , cookies

Route::get('/fun/responses' , function() use($posts){
    return response($posts , 201) 
    -> header('content-Type' , 'application/json')
    ->cookie('My_COOKIE' , 'mohammad amarneh' , 3600);
});

// redirect route

Route::get('/fun/redirect' , function(){
    return redirect('/contact');
});

Route::get('/fun/back' , function(){
    return back(); // redirect to the last address
});

Route::get('/fun/named-route' , function(){
    return redirect()->route('posts.show',['id' => 1]);
});

Route::get('/fun/away' , function(){
    return redirect()->away('https://google.com'); // redirect to the last address
});

// return json

Route::get('/fun/json' , function() use($posts){
    return response()->json($posts); // redirect to the last address
});

// return file download
Route::get('/fun/download' , function(){
    return response()->download(public_path('/name_file.jpg')); // redirect to the last address
});

// request input (reading user input)

Route::get('/posts' , function() use($posts){
    // dd(request()->all());
    // dd((int)request()->input('page', 1));
    dd((int)request()->query('page', 1));
    return view('posts.index' , ['posts' => $posts]);
});

// middleware