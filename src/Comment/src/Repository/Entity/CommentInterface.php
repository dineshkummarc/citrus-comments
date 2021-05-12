<?php
declare(strict_types=1);

namespace Comment\Repository\Entity;

interface CommentInterface
{
    public function update(int $commentId, int $newStatusId);
    public function getAll();
    public function getAllApproved();
    public function getAllWithStatus(int $statusId);
}