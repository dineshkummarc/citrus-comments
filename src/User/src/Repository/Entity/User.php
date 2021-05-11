<?php
declare(strict_types=1);

namespace User\Repository\Entity;

use Config\MySQLDatabase;

class User implements UserInterface
{

    /**
     * @var mixed|\mysqli
     */
    private $conn;

    public function __construct()
    {
        $this->conn = MySQLDatabase::getInstance();
    }

    public function get() {
        $sql = "SELECT * FROM `user`";
        $rez = $this->database->query($sql);
        return $rez;
    }


}