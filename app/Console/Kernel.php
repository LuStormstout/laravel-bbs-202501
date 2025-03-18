<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // 一小时执行一次「活跃用户」数据生成的命令
        $schedule->command('bbs:calculate-active-user')->hourly();

        // 每天凌晨 00:00 执行一次「同步用户最后活跃时间」的命令
        $schedule->command('bbs:sync-user-active-at')->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
