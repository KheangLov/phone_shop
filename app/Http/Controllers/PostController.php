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

        $pages = Page::all();
        $posts = Post::with('page')->get();
        if ($id !== 0) {
            $post = Post::where('id', (int)$id)->get();
            return view('admin.page.post', ['pages' => $pages, 'post' => $post[0], 'posts' => $posts, 'edit' => true]);
        }
        return view('admin.page.post', ['pages' => $pages, 'posts' => $posts]);
    }

    public function create(Request $request)
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'page_id' => $request->page
        ];

        if (isset($request->thumbnail)) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/post'), $imageName);
            $img = 'images/post/' . $imageName;
            $data['thumbnail'] = $img;
        }

        $post = Post::create($data);
        return redirect()->route('post')->with('message', 'Post created!');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->page_id = $request->page;

        if (isset($request->thumbnail)) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/post'), $imageName);
            $img = 'images/post/' . $imageName;
            $post->thumbnail = $img;
        }

        $post->save();
		$post->update();
		return redirect()
			->route('post')
			->with('message', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $deleted = $post->delete();
        if ($deleted === 0)
            return redirect()
                ->route('post')
                ->with('warning', 'Can\'t delete Post!');

		return redirect()
			->route('post')
			->with('delete_success', 'Post deleted successfully');
    }
}
