<?php
declare(strict_types=1);

namespace Comment\Repository\Entity;

use Config\DatabaseInterface;

/**
 * Class Comment
 * @package Comment\Repository\Entity
 */
class Comment implements CommentInterface
{
    const COMMENT_STATUS_PENDING_ID = 1;
    const COMMENT_STATUS_APPROVED_ID = 2;
    const COMMENT_STATUS_BLOCKED_ID = 3;

    const COMMENT_STATUS_PENDING_TITLE = 'pending';
    const COMMENT_STATUS_APPROVED_TITLE = 'approved';
    const COMMENT_STATUS_BLOCKED_TITLE = 'blocked';

    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function insert(\Comment\Entity\CommentInterface $comment)
    {
        return $this->db->insert("INSERT INTO `comment` (name, email, content)
            VALUES ('{$comment->getUsername()}', '{$comment->getEmail()}', '{$comment->getContent()}')");
    }

    public function getAll()
    {
        return $this->db->fetch("SELECT * FROM `comment`");
    }

    public function getAllApproved()
    {
        return $this->db->fetch("SELECT * FROM `comment` WHERE status=" . self::COMMENT_STATUS_APPROVED_ID);
    }
}