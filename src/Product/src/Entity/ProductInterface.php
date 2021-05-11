<?php
declare(strict_types=1);

namespace Product\Entity;

/**
 * Interface ProductInterface
 * @package Product\Entity
 */
interface ProductInterface
{
    /**
     * Return name
     *
     * @return string
     */
    public  function getName(): string;

    /**
     * Return description
     *
     * @return string
     */
    public  function getDescription(): string;

    /**
     * Return image src
     *
     * @return string
     */
    public  function getImageSrc(): string;

    /**
     * Return id
     *
     * @return string
     */
    public  function getId(): string;
}