<?php


namespace App\Services\Badge;


use App\Badge;
use App\UserStat;

class XpHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('xp')) $this->applyBadge($userStat);

        return parent::handle($userStat);
    }

    private function applyBadge(UserStat $userStat)
    {
        $availableBadges = Badge::xp()->where('required_number', '<=', $userStat->xp)->get();
        $userBadges = $userStat->user->badges;
        $notRecievedBadges = $availableBadges->diff($userBadges);
        if ($notRecievedBadges->isEmpty()) return;

        $userStat->user->badges()->attach($notRecievedBadges);
    }

}
