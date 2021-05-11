<?php
declare(strict_types=1);

namespace WebPage\Handler\Base\Factory;

use Comment\Repository\Entity\Comment;
use Config\DatabaseInterface;
use Product\Repository\Entity\Product;
use WebPage\Form\Homepage\Comment as CommentForm;
use WebPage\Form\Homepage\Login;
use WebPage\Handler\Base\ControllerInterface;
use WebPage\Handler\CommentManager\CommentManager;
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

    /**
     * @param string $route
     * @param string $action
     * @param array $params
     * @return CommentForm|Index|User|CommentManager
     */
    public function make(string $route, string $action, array $params)
    {
        switch ($route) {
            case "comment-manager":
                return $this->commentManager($action, $params);
            case "user":
//                $userRepo = new \User\Repository\Entity\User($this->db);
                return new User();
            case "/":
            default:
                return $this->homepage($action, $params);
        }
    }


    /**
     * @param string $action
     * @param array $params
     * @return CommentForm|Index|Login
     */
    private function homepage(string $action, array $params){
        $commentFactoryMethod = new \Comment\FactoryMethod\Entity\Comment();
        $commentFormatter = new \Comment\Formatter\Entity\Comment($commentFactoryMethod);
        $commentRepository = new Comment($this->database);

        if (!empty($action)) {
            switch ($action) {
                case 'login':
                    return new Login($params);
                case 'addComment':
                default:
                    return new \WebPage\Form\Homepage\Comment($params, $commentRepository, $commentFactoryMethod);
            }
        }

        $productFactoryMethod = new \Product\FactoryMethod\Entity\Product();
        $productFormatter = new \Product\Formatter\Entity\Product($productFactoryMethod);
        $productRepository = new Product($this->database);
        return new Index($productRepository, $commentRepository , $productFormatter, $commentFormatter);
    }

    /**
     * @param string $action
     * @param array $params
     * @return CommentManager
     */
    private function commentManager(string $action, array $params) {
        $commentFactoryMethod = new \Comment\FactoryMethod\Entity\Comment();
        $commentFormatter = new \Comment\Formatter\Entity\Comment($commentFactoryMethod);
        $commentRepository = new Comment($this->database);
        return new CommentManager($commentRepository, $commentFormatter);
    }
}