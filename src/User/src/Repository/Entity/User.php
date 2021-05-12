<?php
declare(strict_types=1);

namespace User\Repository\Entity;

use Config\DatabaseInterface;

class User implements UserInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function getUser(string $name, string $password)
    {
        $q = "SELECT * FROM `user` WHERE name='{$name}' AND password='{$password}'";
        return $this->db->fetch($q);
    }

    public function hasAdminRole(int $userId)
    {
        $q = 'SELECT u2r.userId, u2r.roleId, u.name as username, r.name as role FROM `user2role` u2r left join `user` u on u2r.userId=u.id left join `role` r on u2r.roleId=r.id WHERE r.id=1 AND u.id=' . $userId;
        return $this->db->fetch($q);
    }
}