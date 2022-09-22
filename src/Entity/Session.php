<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $session_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $session_start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $session_end = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $traineeship_start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $traineeship_end = null;

    #[ORM\Column]
    private ?int $nbr_students = null;

    #[ORM\OneToMany(mappedBy: 'session_id', targetEntity: Planification::class)]
    private Collection $planifications;

    public function __construct()
    {
        $this->planifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessionName(): ?string
    {
        return $this->session_name;
    }

    public function setSessionName(string $session_name): self
    {
        $this->session_name = $session_name;

        return $this;
    }

    public function getSessionStart(): ?\DateTimeInterface
    {
        return $this->session_start;
    }

    public function setSessionStart(\DateTimeInterface $session_start): self
    {
        $this->session_start = $session_start;

        return $this;
    }

    public function getSessionEnd(): ?\DateTimeInterface
    {
        return $this->session_end;
    }

    public function setSessionEnd(\DateTimeInterface $session_end): self
    {
        $this->session_end = $session_end;

        return $this;
    }

    public function getTraineeshipStart(): ?\DateTimeInterface
    {
        return $this->traineeship_start;
    }

    public function setTraineeshipStart(\DateTimeInterface $traineeship_start): self
    {
        $this->traineeship_start = $traineeship_start;

        return $this;
    }

    public function getTraineeshipEnd(): ?\DateTimeInterface
    {
        return $this->traineeship_end;
    }

    public function setTraineeshipEnd(\DateTimeInterface $traineeship_end): self
    {
        $this->traineeship_end = $traineeship_end;

        return $this;
    }

    public function getNbrStudents(): ?int
    {
        return $this->nbr_students;
    }

    public function setNbrStudents(int $nbr_students): self
    {
        $this->nbr_students = $nbr_students;

        return $this;
    }

    /**
     * @return Collection<int, Planification>
     */
    public function getPlanifications(): Collection
    {
        return $this->planifications;
    }

    public function addPlanification(Planification $planification): self
    {
        if (!$this->planifications->contains($planification)) {
            $this->planifications->add($planification);
            $planification->setSessionId($this);
        }

        return $this;
    }

    public function removePlanification(Planification $planification): self
    {
        if ($this->planifications->removeElement($planification)) {
            // set the owning side to null (unless already changed)
            if ($planification->getSessionId() === $this) {
                $planification->setSessionId(null);
            }
        }

        return $this;
    }
}
