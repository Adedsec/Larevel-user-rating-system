<?php

namespace App\Observers;

use App\Reply;

class ReplyObserver
{
    /**
     * Handle the reply "created" event.
     *
     * @param \App\Reply $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        $reply->user->incrementXp(Reply::XP);
        $reply->user->incrementReplyCount();
    }


}
