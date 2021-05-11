<?php
declare(strict_types=1);

namespace Comment\Entity\Status;

/**
 * Interface StatusInterface
 * @package Comment\Entity\Status
 */
interface StatusInterface
{
    public function getId(): int;
    public function getTitle(): string;
}