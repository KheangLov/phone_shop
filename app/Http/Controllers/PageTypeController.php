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
}
