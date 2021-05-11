<?php
declare(strict_types=1);

namespace Config;

/**
 * Class MySQLDatabase
 */
class MySQLDatabase implements DatabaseInterface
{
    private $conn;

    /**
     * MySQLDatabase constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $db
     */
    public function __construct(string $host, string $user, string $password, string $db)
    {
        $this->conn = new \mysqli($host, $user, $password, $db);
        if ($this->conn->connect_errno) {
            printf("Connection failed: %s\n", $this->conn->connect_error);
            exit();
        }
    }

    public function fetch(string $query) {
        $result = $this->conn->query($query);
        if ($result->num_rows === 0) {
            printf("No results");
            exit();
        }
        $result = $result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

}