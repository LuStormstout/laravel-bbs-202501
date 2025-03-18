<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncUserActiveAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bbs:sync-user-active-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将用户最后活跃时间从 Redis 同步到数据库';

    /**
     * Execute the console command.
     *
     * @param User $user
     */
    public function handle(User $user): void
    {
        $user->syncUserActiveAt();
        $this->info('同步用户最后活跃时间成功！');
    }
}
