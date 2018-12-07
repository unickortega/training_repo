<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Input;
use App\Like;
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

// Route::get('hello', 'HelloController@index');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Route::get('/vote','LikesController@voteUp');
Route::get('/likes','LikesController@check_likes');// route for liking inside a post
Route::get('/likes_main', 'LikesController@voteUp');
// Route::get('/likes_main/{like}/post', 'LikesController@voteUp');

// Route::any('/search_post', function(){
//     $query = Input::get ('q');
//     $post = Post::where('title', 'LIKE', '%'.$query.'%')->orWhere('body', 'LIKE', '%'.$query.'%')->get();
//     if(count($post) > 0)
//         return view('/search_post')->withDetails($post)->withQuery ( $query );
//     else return view ('/search_post')->withMessage('No Details found. Try to search again !');
// }); 

/*Route::get('/about', function()
{
    return view('pages.about');
});
*/





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
