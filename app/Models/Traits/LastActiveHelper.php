<?php

namespace App\Models\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

/**
 * Trait LastActiveHelper
 *
 * @package App\Models\Traits
 */
trait LastActiveHelper
{

    /**
     * Redis 哈希表的前缀
     *
     * @var string
     */
    protected string $hashPrefix = 'lustormstout_last_active_at_';

    /**
     * Redis 哈希表中的字段前缀
     *
     * @var string
     */
    protected string $fieldPrefix = 'user_';

    /**
     * 记录用户最后活跃时间
     *
     * @return void
     */
    public function recordLastActiveTimeAt(): void
    {
        // 获取今天日期的 Redis 哈希表的命名, 如: lustormstout_last_active_at_2025-03-18
        $hash = $this->getHashFromDateString(Carbon::now()->toDateString());

        // Redis 哈希表中的字段, 如: user_1
        $field = $this->getHashField();

        // 当前时间, 如: 2025-03-18 12:00:00
        $now = Carbon::now()->toDateTimeString();

        // 将数据写入 Redis, 字段已存在的话会被更新
        Redis::hSet($hash, $field, $now);
    }

    /**
     * 将 Redis 中的用户最后活跃时间同步到数据库
     * 我们是在今天来处理昨天的数据, 当同步完成之后我们删除掉昨天的哈希表
     *
     * @return void
     */
    public function syncUserActiveAt(): void
    {
        // 获取昨天的日期的 Redis 哈希表的命名, 如: lustormstout_last_active_at_2025-03-17
        $hash = $this->getHashFromDateString(Carbon::yesterday()->toDateString());

        // 从 Redis 中获取所有哈希表中的数据
        $data = Redis::hGetAll($hash);

        foreach ($data as $user_id => $activeAt) {
            // user_1 => 2025-03-18 12:00:00
            // 字段名中的用户 ID, 如: 1
            $userId = str_replace($this->fieldPrefix, '', $user_id);

            // 只有用户存在时才更新数据库
            if ($user = $this->find($userId)) {
                $user->last_active_at = $activeAt;
                $user->save();
            }
        }

        // 删除 Redis 中的哈希表
        Redis::del($hash);
    }

    /**
     * 在读取 last_active_at 字段时不存在的话就去 Redis 中获取, 如果 Redis 中也不存在就返回用户注册时间
     *
     * @param $value
     * @return Carbon|string
     */
    public function getLastActiveAtAttribute($value): string|Carbon
    {
        // 获取今天日期的 Redis 哈希表的命名, 如: lustormstout_last_active_at_2025-03-18
        $hash = $this->getHashFromDateString(Carbon::now()->toDateString());

        // Redis 哈希表中的字段, 如: user_1
        $field = $this->getHashField();

        // 从 Redis 中获取用户最后活跃时间
        $activeAt = Redis::hGet($hash, $field) ?? $value;

        // 如果存在的话就返回时间对应的 Carbon 实例
        if ($activeAt) {
            return new Carbon($activeAt);
        } else {
            // 否则就返回用户注册时间
            return $this->created_at;
        }
    }

    /**
     * 获取 Redis 哈希表的命名
     *
     * @param $data
     * @return string
     */
    public function getHashFromDateString($data): string
    {
        return $this->hashPrefix . $data;
    }

    /**
     * 获取 Redis 哈希表中的字段
     *
     * @return string
     */
    public function getHashField(): string
    {
        return $this->fieldPrefix . $this->id;
    }
}
