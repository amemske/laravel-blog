<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
//     return view('posts',  [
//         'posts' => Post::all()
//     ]);
// });

Route::get('/', function() {
    return view('posts', [
        'posts' => Post::latest()->with(['category', 'user'])->get() // prevent n+1 problem
    ]);
});


   // $document = YamlFrontMatter::parseFile(resource_path('posts/my-first-post.html'));
   // ddd($document->excerpt);


    //     $posts = Post::all();
//  //  ddd($posts);

//     return view('posts',  [
//         'posts' => $posts
//     ]);

// Route::get('/posts/{post}', function ($id){
//     $post =   Post::findOrFail($id);

//     return view('post', [
//         'post' => $post
//     ]);

// });

Route::get('/posts/{post:slug}', function (Post $post){
    //$post =   Post::findOrFail($post);

    return view('post', [
        'post' => $post
    ]);

});

Route::get('/categories/{category:slug}', function (Category $category){

return view('posts',  [
           'posts' => $category ->posts->load(['category','user'])
]);

});

Route::get('/authors/{user:username}', function (User $user) {
    //dd($user);
    return view('posts', ['posts' => $user->posts
    ]);
});