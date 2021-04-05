<?php

namespace App\Observers;

use App\Services\Badge\BadgeApplier;
use App\UserStat;

class UserStatObserver
{


    /**
     * Handle the user stat "updated" event.
     *
     * @param \App\UserStat $userStat
     * @return void
     */
    public function updated(UserStat $userStat)
    {
        resolve(BadgeApplier::class)->apply($userStat);
    }

}
