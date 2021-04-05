<?php


namespace App\Services\Badge;


use App\Badge;
use App\User;
use App\UserStat;

class AbstractHandler implements Handler
{
    private $nextHandler;

    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(UserStat $userStat)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($userStat);
        }

        return null;
    }

    public function applyBadge(UserStat $userStat)
    {
        $availableBadges = $this->getAvailableBadges($userStat);
        $userBadges = $userStat->user->badges;
        $notRecievedBadges = $availableBadges->diff($userBadges);
        if ($notRecievedBadges->isEmpty()) return;

        $userStat->user->badges()->attach($notRecievedBadges);
    }

    abstract protected function getAvailableBadges(UserStat $userStat);
}
