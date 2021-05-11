<?php
declare(strict_types=1);

namespace WebPage\Handler\User;


class User extends \WebPage\Handler\Base\AbstractController
{
    const TPL_NAME = 'user.php';

    public function __construct(string $tplName = ''){
        $this->tplName = self::TPL_NAME;
        parent::__construct($this->tplName);
    }

    public function read(): array
    {
        return ['user'=>'Nebojsa'];
    }
}