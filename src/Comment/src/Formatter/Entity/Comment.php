<?php
declare(strict_types=1);

namespace Comment\Formatter\Entity;

/**
 * Class Comment
 * @package Comment\Formatter\Entity
 */
class Comment implements CommentInterface
{

    /**
     * @var \Comment\FactoryMethod\Entity\CommentInterface
     */
    private $commentFactory;

    public function __construct(\Comment\FactoryMethod\Entity\CommentInterface $commentFactory)
    {
        $this->commentFactory = $commentFactory;
    }

    public function format(array $data): array
    {
        $result = [];
        foreach ($data as $comment) {
            $result[] = $this->commentFactory->make($comment);
        }
        return $result;
    }
}