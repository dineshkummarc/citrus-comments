<?php
declare(strict_types=1);

namespace User\FactoryMethod\Entity;

class User implements UserInterface
{

    public function make(array $data): \User\Entity\UserInterface
    {
        return new \User\Entity\User(
          $data['name'],
            $data['password']
        );
    }
}