<?php
declare(strict_types=1);

namespace User\Entity;

use User\Entity\Role\RoleInterface;

interface UserInterface
{
    public function getUsername(): string;
    public function getRole(): RoleInterface;
}