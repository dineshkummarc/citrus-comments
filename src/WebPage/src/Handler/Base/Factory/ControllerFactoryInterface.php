<?php
declare(strict_types=1);

namespace WebPage\Handler\Base\Factory;

use WebPage\Handler\Base\ControllerInterface;

/**
 * Interface ControllerInterface
 * @package WebPage\Handler\Base
 */
interface ControllerFactoryInterface
{
    public function make(string $route, string $action, array $params);
}