<?php

namespace App\Domain\Task\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ApiResource
 */
class Task
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \DateTime
     */
    private $lastUpdate;

    /**
     * @var int
     */
    private $status;

    /**
     * @var array
     */
    private $categories;

    /**
     * @var array
     */
    private $tags;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }


    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTime $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }
}
