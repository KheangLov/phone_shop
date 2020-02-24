<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];

        $categories = Category::with('user')->paginate(10);
        if ($id !== 0) {
            $category = Category::where('id', (int)$id)->where('user_id', Auth::user()->id)->get();
            return view('admin.category.index', ['category' => $category[0], 'categories' => $categories, 'edit' => true]);
        }
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('category.index')->with('message', 'Category created!');
    }

    public function update(Request $request, $category)
    {
        $cate = Category::find($category);
		$cate->name = $request->name;
		$cate->description = $request->description;
        $cate->user_id = Auth::user()->id;
        $cate->save();
		$cate->update();
		return redirect()
			->route('category.index')
			->with('message', 'Category updated successfully!');
    }

    public function destroy($category)
    {
        $cate = Category::where('id', $category)
            ->where('user_id', Auth::user()->id);
        $deleted = $cate->delete();
        if ($deleted === 0)
            return redirect()
                ->route('category.index')
                ->with('warning', 'Can\'t delete category!');

		return redirect()
			->route('category.index')
			->with('delete_success', 'Category deleted successfully');
    }
}
