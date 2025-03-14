<?php

namespace Database\Factories;

use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    protected $model = Topic::class;

    public function definition(): array
    {
        $sentence = $this->faker->sentence();
        $createdAt = Carbon::now()->subDays(rand(0, 30))->addHours(rand(1, 24)); // 随机过去 30 天内的时间
        $updatedAt = (rand(0, 1) ? $createdAt->clone()->addHours(rand(1, 48)) : $createdAt); // 有一定概率相同

        return [
            'title' => $sentence,
            'body' => $this->faker->text(),
            'excerpt' => $sentence,
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
