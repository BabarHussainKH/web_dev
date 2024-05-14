<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/message', function () {
    return "Message ";
});

Route::get('/posts/{filter}/social/{postId}', function ($filter, $id) {
    return $id . " posts with filter " . $filter;
});

// Route::get("/posts", function () use ($posts) {
//     return response()->json($posts);
// });


$posts = array();

$posts[] = new Post(1, "First Post", "This is the content of the first post.");
$posts[] = new Post(2, "Second Post", "This is the content of the second post.");
$posts[] = new Post(3, "Third Post", "This is the content of the third post.");


$message = "https://www.google.com.pk";
Route::get("/news", function () use($posts) {
    return view("news", [ "posts"=> $posts]);   

});






class Post
{
    public $id;
    public $title;
    public $content;

    // Constructor
    public function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
}


?>