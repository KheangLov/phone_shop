<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $mails = Notification::where('notifiable_id', Auth::user()->id)->get();

        return view('admin.mail.index', ['mails' => $mails]);
    }

    public function detail($id)
    {
        $mail = Notification::where('id', $id)
            ->where('notifiable_id', Auth::user()->id)
            ->get();

        return view('admin.mail.detail', ['mail' => $mail[0]]);
    }
}
