<?php
declare(strict_types=1);

namespace Comment\Entity;

use Comment\Entity\Status\StatusInterface;

/**
 * Interface CommentInterface
 * @package Comment\Entity
 */
interface CommentInterface
{
    public function getUsername(): string;

    public function getEmail(): string;

    public function getContent(): string;

    public function getStatusEntity(): StatusInterface;
}