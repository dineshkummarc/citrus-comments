<?php
declare(strict_types=1);

namespace Config;

interface DatabaseInterface
{
    /**
     * @param string $query
     * @return mixed
     */
    public function fetch(string $query);

    public function insert(string $query);
}