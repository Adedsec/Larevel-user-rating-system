<?php

namespace App\Observers;

use App\Topic;

class TopicObserver
{
    /**
     * Handle the topic "created" event.
     *
     * @param \App\Topic $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        $topic->user->incrementXp(Topic::XP);
        $topic->user->incrementTopicCount();
    }


}
