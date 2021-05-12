<?php
declare(strict_types=1);

namespace Comment\Repository\Entity;

use Config\DatabaseInterface;

/**
 * Class NewComment
 * @package Comment\Repository\Entity
 */
class NewComment implements NewCommentInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function insert(\Comment\Entity\NewCommentInterface $comment)
    {
        $q = "INSERT INTO `comment` (name, email, content, status)
            VALUES ('{$comment->getUsername()}', '{$comment->getEmail()}', '{$comment->getContent()}', " . $comment->getStatusEntity()->getId() . ")";
        return $this->db->insert($q);
    }
}