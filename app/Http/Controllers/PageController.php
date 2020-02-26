<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];

        $pages = Page::with('pageType')
            ->orderBy('position')
            ->get();
        $pageTypes = PageType::all();
        if ($id !== 0) {
            $page = Page::where('id', (int)$id)->get();
            return view('admin.page.index', ['page' => $page[0], 'pages' => $pages, 'pageTypes' => $pageTypes, 'edit' => true]);
        }
        return view('admin.page.index', ['pages' => $pages, 'pageTypes' => $pageTypes]);
    }

    public function create(Request $request)
    {
        $page = Page::create([
            'name' => $request->name,
            'page_type_id' => $request->page_type,
            'status' => $request->status,
            'position' => $request->position
        ]);
        return redirect()->route('page')->with('message', 'Page created!');
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->name = $request->name;
        $page->status = $request->status;
        $page->position = $request->position;
        $page->page_type_id = $request->page_type;
        $page->save();
		$page->update();
		return redirect()
			->route('page')
			->with('message', 'Page updated successfully!');
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $deleted = $page->delete();
        if ($deleted === 0)
            return redirect()
                ->route('page')
                ->with('warning', 'Can\'t delete page!');

		return redirect()
			->route('page')
			->with('delete_success', 'Page deleted successfully');
    }
}
