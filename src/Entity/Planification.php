<?php

namespace App\Entity;

use App\Repository\PlanificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanificationRepository::class)]
class Planification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'planifications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $plan = null;

    #[ORM\ManyToOne(inversedBy: 'planifications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?activities $activity = null;

    #[ORM\ManyToOne(inversedBy: 'planifications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?session $session = null;

    #[ORM\Column]
    private ?int $people_left = null;

    #[ORM\Column(nullable: true)]
    private ?bool $archive = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanId(): ?user
    {
        return $this->plan;
    }

    public function setPlanId(?user $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getActivityId(): ?activities
    {
        return $this->activity;
    }

    public function setActivityId(?activities $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getSessionId(): ?session
    {
        return $this->session;
    }

    public function setSessionId(?session $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getPeopleLeft(): ?int
    {
        return $this->people_left;
    }

    public function setPeopleLeft(int $people_left): self
    {
        $this->people_left = $people_left;

        return $this;
    }

    public function isArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(?bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }
}
