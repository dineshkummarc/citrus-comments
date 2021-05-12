<?php
declare(strict_types=1);

namespace Comment\Repository\Entity;


interface NewCommentInterface
{
    public function insert(\Comment\Entity\NewCommentInterface $comment);
}