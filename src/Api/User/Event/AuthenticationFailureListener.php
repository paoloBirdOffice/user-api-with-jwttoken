<?php
/**
 * Created by PhpStorm.
 * User: Paolo Castro
 * Date: 03/05/18
 * Time: 14:46
 */

namespace App\Api\User\Event;

use FOS\UserBundle\Model\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationFailureListener
{
    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event) :void
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof UserInterface) {
            return;
        }

        $data['user_id'] = $user->getId();
        $data['user_email'] = $user->getEmail();

        $event->setData($data);
    }
}