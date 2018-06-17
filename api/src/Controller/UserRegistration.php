<?php
// api/src/Controller/UserRegistration.php

namespace App\Controller;

use App\Entity\User;

class UserRegistration
{
    private $userRegistration;

    public function __construct(\App\Service\UserRegistrationService $userRegistration)
    {
        $this->userRegistration = $userRegistration;
    }

    public function __invoke(User $data): User
    {
        $user = $this->userRegistration->registration($data);

        if($user != null) {
            $this->$this->userRegistration->sendValidation($user);
        }

        return $data;
    }
}
