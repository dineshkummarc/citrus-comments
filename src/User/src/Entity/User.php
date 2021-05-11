<?php
declare(strict_types=1);

namespace User\Entity;

use User\Entity\Role\RoleInterface;

/**
 * Class User
 * @package User\Entity
 */
class User implements UserInterface
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var RoleInterface
     */
    private $roleEntity;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param RoleInterface $roleEntity
     */
    public function __construct(string $username, string $password, RoleInterface $roleEntity)
    {
        $this->username = $username;
        $this->password = $password;
        $this->roleEntity = $roleEntity;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getRole(): RoleInterface
    {
        return $this->roleEntity;
    }
}