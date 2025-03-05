<?php

namespace App\Observers;

use App\Models\Reply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    /**
     * When the reply is created, update the reply count of the topic.
     *
     * @param Reply $reply
     * @return void
     */
    public function created(Reply $reply): void
    {
        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
    }

    /**
     * When creating the reply, clean the content's HTML tags.
     *
     * @param Reply $reply
     * @return void
     * @throws ValidationException
     */
    public function creating(Reply $reply): void
    {
        $reply->content = clean($reply->content, 'user_topic_body');

        // 在这里我们重新去验证回复的内容, 因为可能遇到 xss 攻击的问题我们过滤完了之后内容为空
        // <script>alert('This is dangerous!!!!')</script>
        $validator = Validator::make($reply->toArray(), [
            'content' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
