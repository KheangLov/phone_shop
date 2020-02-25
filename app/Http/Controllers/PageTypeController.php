<?php

namespace App\Http\Controllers;

use App\PageType;
use Illuminate\Http\Request;

class PageTypeController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];

        $pageTypes = PageType::all();
        if ($id !== 0) {
            $pageType = PageType::where('id', (int)$id)->get();
            return view('admin.page.page-type', ['pageType' => $pageType[0], 'pageTypes' => $pageTypes, 'edit' => true]);
        }
        return view('admin.page.page-type', ['pageTypes' => $pageTypes]);
    }

    public function create(Request $request)
    {
        $pageType = PageType::create([
            'name' => $request->name
        ]);
        return redirect()->route('page_type')->with('message', 'Page-Type created!');
    }

    public function update(Request $request, $id)
    {
        $pageType = PageType::find($id);
		$pageType->name = $request->name;
        $pageType->save();
		$pageType->update();
		return redirect()
			->route('page_type')
			->with('message', 'Page-Type updated successfully!');
    }

    public function destroy($id)
    {
        $pageType = PageType::find($id);
        $deleted = $pageType->delete();
        if ($deleted === 0)
            return redirect()
                ->route('page_type')
                ->with('warning', 'Can\'t delete Page-Type!');

		return redirect()
			->route('page_type')
			->with('delete_success', 'Page-Type deleted successfully');
    }
}
