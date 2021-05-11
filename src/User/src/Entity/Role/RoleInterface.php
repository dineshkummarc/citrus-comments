<?php
declare(strict_types=1);

namespace User\Entity\Role;

interface RoleInterface
{
    public function getId(): int;
    public function getName(): string;
}