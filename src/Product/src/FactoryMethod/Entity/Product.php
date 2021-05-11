<?php
declare(strict_types=1);

namespace Product\FactoryMethod\Entity;

/**
 * Class Product
 * @package Product\FactoryMethod
 */
class Product implements ProductInterface
{
    private static $allowedProducts = [
        'Grapefruit', 'Kaffir-lime', 'Lemon', 'Lime', 'Orange', 'Pomelo', 'White-grapefruit', 'Tangerine', 'Yuzu'
    ];

    /**
     * @param array $data
     * @return \Product\Entity\ProductInterface
     * @throws \Exception
     */
    public function make(array $data): \Product\Entity\ProductInterface
    {
        if(!in_array($data['name'], self::$allowedProducts)) {
            throw new \Exception(
                sprintf('Not allowed product type "%s". Expected one of "%s"',
                $data['name'],
                implode(', ', self::$allowedProducts)
            ));
        }
        return new \Product\Entity\Product(
          $data['name'],
          $data['description'],
          $data['imageSrc'],
          $data['id']
        );
    }
}