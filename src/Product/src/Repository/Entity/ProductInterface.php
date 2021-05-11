<?php
declare(strict_types=1);

namespace Product\Repository\Entity;

/**
 * Interface ProductInterface
 * @package Product\Repository\Entity
 */
interface ProductInterface
{
    public function get(int $id);
    public function getAll();
}