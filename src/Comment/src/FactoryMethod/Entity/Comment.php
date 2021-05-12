<?php
declare(strict_types=1);

namespace Comment\FactoryMethod\Entity;

use Comment\Entity\Status\Status;
use Comment\Utils\Status\Id2Title;

/**
 * Class Comment
 * @package Comment\FactoryMethod\Entity
 */
class Comment implements CommentInterface
{
    /**
     * Create comment entity from data
     * @param array $data
     * @return \Comment\Entity\CommentInterface
     */
    public function make(array $data): \Comment\Entity\CommentInterface
    {
        $statusId = isset($data['status']) ? (int) $data['status'] :  1;
        $statusTitle = Id2Title::resolveTitle($statusId);
        $statusEntity = new Status($statusId, $statusTitle);
        $commentId = (int) $data['id'];
        return new \Comment\Entity\Comment(
            $data['name'],
            $data['email'],
            $data['content'],
            $statusEntity,
            $commentId
        );
    }
}