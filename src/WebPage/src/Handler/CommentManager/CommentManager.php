<?php
declare(strict_types=1);

namespace WebPage\Handler\CommentManager;

use Comment\Entity\Comment;
use Comment\Repository\Entity\CommentInterface;
use Comment\Utils\Status\Id2Title;
use WebPage\Handler\Base\AbstractController;

/**
 * Class CommentManager
 * @package WebPage\Handler\CommentManager
 */
class CommentManager extends AbstractController
{
    const TPL_NAME = 'commentManager.php';
    /**
     * @var CommentInterface
     */
    private $commentRepository;
    /**
     * @var \Comment\Formatter\Entity\CommentInterface
     */
    private $commentFormatter;

    public function __construct(
        CommentInterface $commentRepository,
        \Comment\Formatter\Entity\CommentInterface $commentFormatter
    ) {
        $this->commentRepository = $commentRepository;
        $this->commentFormatter = $commentFormatter;
        $this->tplName = self::TPL_NAME;
        parent::__construct($this->tplName);
    }


    public function read(): array
    {
        $comments = $this->commentRepository->getAllWithStatus(Id2Title::COMMENT_STATUS_PENDING_ID);
        $formattedComments = $this->commentFormatter->format($comments);
        return [
            'comments' => $formattedComments
        ];
    }
}