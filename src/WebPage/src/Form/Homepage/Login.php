<?php
declare(strict_types=1);

namespace WebPage\Form\Homepage;

/**
 * Class Login
 * @package WebPage\Form\Homepage
 */
class Login
{
    /**
     * @var array
     */
    private $params;

    /**
     * Login constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->ajaxHandler($this->params);
    }

    /**
     * @param array $params
     */
    private function ajaxHandler(array $params) {
//        $comment = $this->commentFactoryMethod->make($params);
//        $isSuccessful = $this->commentRepository->insert($comment);
//        $msg = $isSuccessful ? '' : 'Comment insert fail';
        $data = ['success' => false, 'message' => 'cao'];
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }

}