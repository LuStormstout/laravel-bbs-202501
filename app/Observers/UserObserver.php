<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    /**
     * 监听用户创建事件
     *
     * @param User $user
     */
    public function saving(User $user): void
    {
        // 为用户生成默认头像, 只有在用户没有设置头像的情况下
        if (empty($user->avatar)) {
            $user->avatar = env('APP_URL') . '/uploads/images/default-avatars/default-avatar.png';
        }
    }
}
