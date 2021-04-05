<?php


namespace App\Services\Badge;


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
}
