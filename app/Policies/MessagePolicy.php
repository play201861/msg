<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * 管理员跳过验证
     *
     * @param User $user
     * @return true|void
     */
    public function before($user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * 作者有删除的权限
     *
     * @param User $user
     * @param Message $message
     * @return bool
     */
    public function delete(User $user, Message $message)
    {
        return $user->isAuthorOf($message);
    }
}
