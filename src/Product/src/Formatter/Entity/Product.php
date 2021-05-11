<?php
declare(strict_types=1);

namespace Product\Formatter\Entity;

/**
 * Class Product
 * @package Product\Formatter\Entity
 */
class Product implements ProductInterface
{
    /**
     * @var \Product\FactoryMethod\Entity\ProductInterface
     */
    private $productFactory;

    /**
     * Product constructor.
     * @param \Product\FactoryMethod\Entity\ProductInterface $productFactory
     */
    public function __construct(\Product\FactoryMethod\Entity\ProductInterface $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    /**
     * @param array $data
     * @return array
     */
    public function format(array $data): array
    {
        $result = [];
        foreach ($data as $product) {
            $result[] = $this->productFactory->make($product);
        }
        return $result;
    }
}