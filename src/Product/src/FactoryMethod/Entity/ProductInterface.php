<?php
declare(strict_types=1);

namespace Product\FactoryMethod\Entity;

/**
 * Interface ProductInterface
 * @package Product\FactoryMethod
 */
interface ProductInterface
{
    public function make(array $data): \Product\Entity\ProductInterface;
}