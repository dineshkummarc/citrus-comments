<?php
declare(strict_types=1);

namespace WebPage\Form\Homepage;

use Comment\Repository\Entity\CommentInterface;

/**
 * Class Comments
 * @package WebPage\Form\Homepage
 */
class Comment
{
    /**
     * @var CommentInterface
     */
    private $commentRepository;
    /**
     * @var array
     */
    private $params;
    /**
     * @var \Comment\FactoryMethod\Entity\CommentInterface
     */
    private $commentFactoryMethod;

    public function __construct(
        array $params,
        CommentInterface $commentRepository,
        \Comment\FactoryMethod\Entity\CommentInterface $commentFactoryMethod
    ){
        $this->params = $params;
        $this->commentRepository = $commentRepository;
        $this->commentFactoryMethod = $commentFactoryMethod;
        $this->ajaxHandler($this->params);
    }

    /**
     * @param array $params
     */
    private function ajaxHandler(array $params) {
        $comment = $this->commentFactoryMethod->make($params);
        $isSuccessful = $this->commentRepository->insert($comment);
        $msg = $isSuccessful ? '' : 'Comment insert fail';
        $data = ['success' => $isSuccessful, 'message' => $msg];
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }


}