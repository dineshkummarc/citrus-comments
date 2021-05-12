<?php
declare(strict_types=1);

namespace WebPage\Form\Homepage;


class Logout
{
    public function __construct()
    {
        $this->ajaxHandler();
    }

    private function ajaxHandler() {
        session_start();
        $_SESSION['username'] = '';
        $_SESSION['isAdmin'] = false;
        session_destroy();

        $data = ['success' => session_status() == 1, 'message' => ''];
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }
}