<?php
declare(strict_types=1);

namespace User\Repository\Entity;

interface UserInterface
{
    public function getUser(string $name, string $password);
    public function hasAdminRole(int $userId);
}