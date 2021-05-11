<?php
declare(strict_types=1);

namespace Comment\Utils\Status;

class Id2Title
{
    const COMMENT_STATUS_PENDING_ID = 1;
    const COMMENT_STATUS_APPROVED_ID = 2;
    const COMMENT_STATUS_BLOCKED_ID = 3;

    const COMMENT_STATUS_PENDING_TITLE = 'pending';
    const COMMENT_STATUS_APPROVED_TITLE = 'approved';
    const COMMENT_STATUS_BLOCKED_TITLE = 'blocked';

    public function resolve(int $id){
        switch ($id) {
            case self::COMMENT_STATUS_PENDING_ID;
                return self::COMMENT_STATUS_PENDING_TITLE;
            case self::COMMENT_STATUS_APPROVED_ID;
                return self::COMMENT_STATUS_APPROVED_TITLE;
            case self::COMMENT_STATUS_BLOCKED_ID;
                return self::COMMENT_STATUS_BLOCKED_TITLE;
        }
    }
}