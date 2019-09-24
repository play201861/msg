<?php

namespace App\Http\Controllers;

use App\Message;

class HomeController extends Controller
{
    /**
     * 认证中间件
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 用户家目录
     *
     * @param Message $message
     * @return \Illuminate\View\View
     */
    public function index(Message $message)
    {
        if (auth()->user()->isAdmin()) {
            $messages = $message->paginate();
        } else {
            $messages = auth()->user()->messages()->paginate();
        }
        return view('home', compact('messages'));
    }
}
