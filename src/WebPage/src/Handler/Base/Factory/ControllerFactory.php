<?php
declare(strict_types=1);

namespace WebPage\Handler\Base\Factory;

use Config\DatabaseInterface;
use Product\Repository\Entity\Product;
use WebPage\Handler\Base\ControllerInterface;
use WebPage\Handler\Homepage\Index;
use WebPage\Handler\User\User;

/**
 * Class Controller
 * @package WebPage\Handler\Base
 */
class ControllerFactory implements ControllerFactoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function make(string $slug): ControllerInterface
    {
        switch ($slug) {
            case "user":
//                $userRepo = new \User\Repository\Entity\User($this->db);
                return new User();
            case "/":
            default:
                return $this->homepage();
        }
    }

    /**
     * @return Index
     */
    private function homepage(){
        $productFactoryMethod = new \Product\FactoryMethod\Entity\Product();
        $productFormatter = new \Product\Formatter\Entity\Product($productFactoryMethod);
        $productRepository = new Product($this->database);
        return new Index($productRepository, $productFormatter);
    }
}