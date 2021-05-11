<?php
declare(strict_types=1);

namespace Product\Repository\Entity;

use Config\DatabaseInterface;

/**
 * Class Product
 * @package Product\Repository\Entity
 */
class Product implements ProductInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function get(int $id)
    {
        return $this->db->fetch("SELECT * FROM `product` WHERE id={$id}");
    }

    public function getAll()
    {
        return $this->db->fetch("SELECT * FROM `product`");
    }
}