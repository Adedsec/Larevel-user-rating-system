<?php


namespace App\Services\Badge;


use App\Badge;
use App\UserStat;

class TopicHandler extends AbstractHandler
{

    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('topic_count')) return $this->applyBadge($userStat);
        return parent::handle($userStat);
    }

    private function applyBadge(UserStat $userStat)
    {
        $availableBadges = Badge::topic()->where('required_number', '<=', $userStat->topic_count)->get();
        $userBadges = $userStat->user->badges;
        $notRecievedBadges = $availableBadges->diff($userBadges);
        if ($notRecievedBadges->isEmpty()) return;

        $userStat->user->badges()->attach($notRecievedBadges);
    }
}
