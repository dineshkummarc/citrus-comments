<?php
declare(strict_types=1);

namespace Comment\Repository\Entity;

interface CommentInterface
{
    public function insert(\Comment\Entity\CommentInterface $comment);
    public function getAll();
    public function getAllApproved();
}