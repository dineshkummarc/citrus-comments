<?php
declare(strict_types=1);

namespace Comment\FactoryMethod\Entity;

interface NewCommentInterface
{
    public function make(array $data): \Comment\Entity\NewCommentInterface;
}