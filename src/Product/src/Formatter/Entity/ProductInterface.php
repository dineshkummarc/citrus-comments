<?php
declare(strict_types=1);

namespace Product\Formatter\Entity;

interface ProductInterface
{
    public function format(array $data): array;
}