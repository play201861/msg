<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * 认证中间件
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 保存留言
     *
     * @param Message $message
     * @param MessageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Message $message, MessageRequest $request)
    {
        $message->user_id = auth()->id();
        $message->content = $request->content;
        $message->reply_id = $request->reply_id;

        $message->save();

        return back();
    }

    /**
     * 删除留言
     *
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Message $message)
    {
        $this->authorize($message);

        $message->delete();
        session()->flash('status', '留言已删除');

        return back();
    }
}
