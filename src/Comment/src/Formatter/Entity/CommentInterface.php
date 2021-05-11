<?php
declare(strict_types=1);

namespace Comment\Formatter\Entity;

interface CommentInterface
{
    public function format(array $data): array;
}