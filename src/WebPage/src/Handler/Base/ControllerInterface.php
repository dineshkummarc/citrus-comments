<?php
declare(strict_types=1);

namespace WebPage\Handler\Base;

/**
 * Interface ControllerInterface
 * @package WebPage\Handler\Base
 */
interface ControllerInterface
{
    public function start();

    public  function read(): array;

    public function stop(array $data);
}