<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];

        $posts = Post::all();
        if ($id !== 0) {
            $post = Post::where('id', (int)$id)->get();
            return view('admin.page.post', ['post' => $post[0], 'posts' => $posts, 'edit' => true]);
        }
        return view('admin.page.post', ['posts' => $posts]);
    }
}
