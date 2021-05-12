<?php
declare(strict_types=1);

namespace Comment\FactoryMethod\Entity;


use Comment\Entity\Status\Status;
use Comment\Utils\Status\Id2Title;

class NewComment implements NewCommentInterface
{
    /**
     * Create comment entity from data
     * @param array $data
     * @return \Comment\Entity\NewCommentInterface
     */
    public function make(array $data): \Comment\Entity\NewCommentInterface
    {
        $statusId = \Comment\Utils\Status\Id2Title::COMMENT_STATUS_PENDING_ID;
        $statusTitle = \Comment\Utils\Status\Id2Title::COMMENT_STATUS_PENDING_TITLE;
        $statusEntity = new Status($statusId, $statusTitle);
        return new \Comment\Entity\NewComment(
            $data['name'],
            $data['email'],
            $data['content'],
            $statusEntity
        );
    }
}