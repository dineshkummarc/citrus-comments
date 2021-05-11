<?php
declare(strict_types=1);

namespace Comment\FactoryMethod\Entity;

/**
 * Interface CommentInterface
 * @package Comment\FactoryMethod\Entity
 */
interface CommentInterface
{
    public function make(array $data): \Comment\Entity\CommentInterface;
}