<?php
declare(strict_types=1);

namespace WebPage\Handler\Homepage;

use Product\Repository\Entity\ProductInterface;
use WebPage\Handler\Base\AbstractController;

class Index extends AbstractController
{

    const TPL_NAME = 'index.php';

    /**
     * @var ProductInterface
     */
    private $productRepository;
    /**
     * @var \Product\Formatter\Entity\ProductInterface
     */
    private $productFormatter;

    /**
     * Homepage constructor.
     * @param ProductInterface $productRepository
     * @param \Product\Formatter\Entity\ProductInterface $productFormatter
     */
    public function __construct(
        ProductInterface $productRepository,
        \Product\Formatter\Entity\ProductInterface $productFormatter
    ) {
        $this->productRepository = $productRepository;
        $this->productFormatter = $productFormatter;
        $this->tplName = self::TPL_NAME;
        parent::__construct($this->tplName);
    }

    /**
     * Read method returns data to render in view.
     * @return array
     */
    public function read(): array{
        $products = $this->productRepository->getAll();
        $formattedProducts = $this->productFormatter->format($products);
        return [
            'products' => $formattedProducts
        ];
    }

}