<?php

namespace App\Domain\Task\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Task\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Category\Entity\Category", inversedBy="tasks")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @OneToOne(targetEntity="App\Domain\Status\Entity\Status")
     * @JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     *@ORM\OneToMany(targetEntity="App\Domain\Tags\Entity\Tags", mappedBy="task")
     */
    private $tags;

    public function __construct() {
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function setCategory($category){
        $this->category = $category;
        return $this;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getTags(){
        return $this->tags;
    }
}
