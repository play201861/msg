<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * 每条留言都属于一个用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 生成分页格式的数据
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate()
    {
        return $this->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoinSub($this->leftJoin('users', 'messages.user_id', '=', 'users.id')
                ->select(
                    'messages.id',
                    'messages.content',
                    'users.name as user_name',
                    'users.email as user_email'
                ), 'reply', 'messages.reply_id', '=', 'reply.id')
            ->select(
                'messages.id',
                'messages.user_id',
                'messages.created_at',
                'messages.content',
                'users.name as user_name',
                'users.email as user_email',
                'reply.content as reply',
                'reply.user_name as reply_user_name',
                'reply.user_email as reply_user_email'
            )->latest()
            ->paginate();
    }
}
