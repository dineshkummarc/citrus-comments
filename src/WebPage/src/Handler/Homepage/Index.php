<?php
declare(strict_types=1);

namespace WebPage\Handler\Homepage;

use Comment\Repository\Entity\CommentInterface;
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
     * @var CommentInterface
     */
    private $commentRepository;
    /**
     * @var \Comment\Formatter\Entity\CommentInterface
     */
    private $commentFormatter;

    /**
     * Homepage constructor.
     * @param ProductInterface $productRepository
     * @param CommentInterface $commentRepository
     * @param \Product\Formatter\Entity\ProductInterface $productFormatter
     * @param \Comment\Formatter\Entity\CommentInterface $commentFormatter
     */
    public function __construct(
        ProductInterface $productRepository,
        CommentInterface $commentRepository,
        \Product\Formatter\Entity\ProductInterface $productFormatter,
        \Comment\Formatter\Entity\CommentInterface $commentFormatter
    ) {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
        $this->productFormatter = $productFormatter;
        $this->commentFormatter = $commentFormatter;
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
        $comments = $this->commentRepository->getAllApproved();
        $formattedComments = $this->commentFormatter->format($comments);
        return [
            'products' => $formattedProducts,
            'comments' => $formattedComments
        ];
    }

}