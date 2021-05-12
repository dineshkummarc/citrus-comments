<?php
declare(strict_types=1);

namespace User\FactoryMethod\Entity;

interface UserInterface
{
    public function make(array $data): \User\Entity\UserInterface;
}