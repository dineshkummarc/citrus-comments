<?php
declare(strict_types=1);

namespace WebPage\Form\Homepage;

use User\Repository\Entity\UserInterface;

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
     * @var UserInterface
     */
    private $userRepository;

    /**
     * Login constructor.
     * @param array $params
     * @param UserInterface $userRepository
     */
    public function __construct(
        array $params,
        UserInterface $userRepository
    ) {
        $this->params = $params;
        $this->userRepository = $userRepository;
        $this->ajaxHandler($this->params);
    }

    /**
     * @param array $params
     */
    private function ajaxHandler(array $params) {
        $authPassed = false;
        $user = $this->userRepository->getUser($params['name'], $params['password']);
        $hasAdminRole = false;
        if (count($user) > 0) {
            $hasAdminRole = $this->userRepository->hasAdminRole((int) $user[0]['id']);
            if (count($hasAdminRole) > 0) {
                $authPassed = true;
            }
        }
        if ($authPassed) {
            session_start();
            $_SESSION['username'] = $params['name'];
            $_SESSION['isAdmin'] = true;
        }

        $msg = $authPassed ? '' : 'authorization failed';
        $data = ['success' => $authPassed, 'message' => $msg];
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }

}