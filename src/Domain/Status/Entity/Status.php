<?php

namespace App\Domain\Status\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource
 */
class Status
{
    /**
     *@var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTasks(): ?string
    {
        return $this->tasks;
    }
}
