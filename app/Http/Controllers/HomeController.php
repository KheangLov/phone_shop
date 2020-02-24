<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function sendMail()
    {
        $name = 'Krunal';
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUs($name));
        return 'Email was sent';
    }
}
