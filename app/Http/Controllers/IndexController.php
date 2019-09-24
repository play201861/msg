<?php

namespace App\Http\Controllers;

use App\Message;

class IndexController extends Controller
{
    /**
     * 网站根目录
     *
     * @param Message $message
     * @return \Illuminate\View\View
     */
    public function index(Message $message)
    {
        return view('welcome', [
            'messages' => $message->paginate()
        ]);
    }
}
