<?php
declare(strict_types=1);

namespace User\Repository\Entity;

interface UserInterface
{
    public function get(int $id);
}