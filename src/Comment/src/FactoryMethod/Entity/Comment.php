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
        $statusResolver = new Id2Title();
        $statusTitle = $statusResolver->resolve($statusId);
        $statusEntity = new Status($statusId, $statusTitle);
        return new \Comment\Entity\Comment(
            $data['name'],
            $data['email'],
            $data['content'],
            $statusEntity
        );
    }
}