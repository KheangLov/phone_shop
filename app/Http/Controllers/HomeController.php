<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageType;
use App\Post;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Notification;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pages = Page::with(['pageType', 'posts'])->get();
        return view('home', ['pages' => $pages]);
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function products()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function productDetails($id)
    {
        $product = Product::with(['category'])
            ->where('id', $id)
            ->get();

        return view('product-detail', [
            'product' => $product[0]
        ]);
    }

    public function sendMail(Request $request)
    {
        $objDetails = new \stdClass();
        $objDetails->name = $request->name;
        $objDetails->subject = $request->subject;
        $objDetails->email = $request->email;
        $objDetails->message = $request->message;

        $details = [
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message
        ];

        $admin = User::where('role_id', 1)->get();
        Mail::to($request->email)->send(new ContactUs($objDetails));
        Notification::send($admin, new UserNotification($details));
        return redirect()->route('contact_us')->with('success', 'Email sent!');
    }
}
