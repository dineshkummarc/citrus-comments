<?php
declare(strict_types=1);

namespace Product\Entity;

/**
 * Class Product
 * @package Product\Entity
 */
class Product implements ProductInterface
{

    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $imageSrc;

    public function __construct(string $name, string $description, string $imageSrc, string $id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->imageSrc = $imageSrc;
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @inheritDoc
     */
    public function getImageSrc(): string
    {
        return $this->imageSrc;
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->id;
    }
}