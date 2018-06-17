<?php
// api/src/Service/UserRegistration.php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserRegistrationService
{

    private $em;
    //private $mailer;

    public function __construct(EntityManagerInterface $em/*, \Swift_Mailer $mailer*/)
    {
        $this->em = $em;
        //$this->mailer = $mailer;
    }

    /**
     * @param $user User
     * @return User
     */
    public function registration($user) {

        $user->setConfirm(bin2hex(random_bytes(64)));
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    /**
     * @param $user User
     */
    public function sendValidation($user) {

       /* if($user->getConfirm() != null) {
            $message = (new \Swift_Message('Image Description - Confirm your email'))
                ->setFrom('contact@karl-pineau.fr')
                ->setTo($user->getEmail())
                ->addPart(
                    'Click on the following link to confirm your account: '.$user->getConfirm()
                );

            $this->mailer->send($message);
        }*/
    }
}
