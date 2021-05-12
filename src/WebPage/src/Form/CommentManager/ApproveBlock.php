<?php
declare(strict_types=1);

namespace WebPage\Form\CommentManager;

use Comment\FactoryMethod\Entity\CommentInterface;
use Comment\Utils\Status\Id2Title;

class ApproveBlock
{
    /**
     * @var CommentInterface
     */
    private $commentFactoryMethod;

    /**
     * @var array
     */
    private $params;
    /**
     * @var \Comment\Repository\Entity\CommentInterface
     */
    private $commentRepository;

    public function __construct(
        array $params,
        CommentInterface $commentFactoryMethod,
        \Comment\Repository\Entity\CommentInterface $commentRepository
    ){
        $this->params = $params;
        $this->commentFactoryMethod = $commentFactoryMethod;
        $this->commentRepository = $commentRepository;
        $this->ajaxHandler($this->params);
    }

    /**
     * @param array $params
     */
    private function ajaxHandler(array $params) {
        $commentId = (int) $params['commentId'];
        $newStatusId = Id2Title::resolveId($params['newStatus']);
        $isSuccessful = $this->commentRepository->update($commentId, $newStatusId);
        $msg = $isSuccessful ? '' : 'Comment insert fail';
        $data = ['success' => $isSuccessful, 'message' => $msg];
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }
}