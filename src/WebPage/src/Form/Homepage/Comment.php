<?php
declare(strict_types=1);

namespace WebPage\Form\Homepage;

use Comment\FactoryMethod\Entity\NewCommentInterface;

/**
 * Class Comments
 * @package WebPage\Form\Homepage
 */
class Comment
{
    /**
     * @var \Comment\Repository\Entity\NewCommentInterface
     */
    private $newCommentRepository;
    /**
     * @var array
     */
    private $params;
    /**
     * @var NewCommentInterface
     */
    private $commentFactoryMethod;

    public function __construct(
        array $params,
        \Comment\Repository\Entity\NewCommentInterface $commentRepository,
        NewCommentInterface $commentFactoryMethod
    ){
        $this->params = $params;
        $this->newCommentRepository = $commentRepository;
        $this->commentFactoryMethod = $commentFactoryMethod;
        $this->ajaxHandler($this->params);
    }

    /**
     * @param array $params
     */
    private function ajaxHandler(array $params) {
        $comment = $this->commentFactoryMethod->make($params);
        $isSuccessful = $this->newCommentRepository->insert($comment);
        $msg = $isSuccessful ? '' : 'Comment insert fail';
        $data = ['success' => $isSuccessful, 'message' => $msg];
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }


}