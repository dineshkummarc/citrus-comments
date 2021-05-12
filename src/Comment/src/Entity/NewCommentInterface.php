<?php
declare(strict_types=1);

namespace Comment\Entity;


use Comment\Entity\Status\StatusInterface;

interface NewCommentInterface
{
    public function getUsername(): string;

    public function getEmail(): string;

    public function getContent(): string;

    public function getStatusEntity(): StatusInterface;
}