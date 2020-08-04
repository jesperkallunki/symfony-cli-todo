<?php

namespace App\Entity;

use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TodoRepository::class)
 */
class Todo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $ts_created;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $completed;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $ts_completed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTsCreated(): ?\DateTimeInterface
    {
        return $this->ts_created;
    }

    public function setTsCreated(\DateTimeInterface $ts_created): self
    {
        $this->ts_created = $ts_created;

        return $this;
    }

    public function getCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(?bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }

    public function getTsCompleted(): ?\DateTimeInterface
    {
        return $this->ts_completed;
    }

    public function setTsCompleted(?\DateTimeInterface $ts_completed): self
    {
        $this->ts_completed = $ts_completed;

        return $this;
    }
}
