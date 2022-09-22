<?php

namespace App\Entity;

use App\Repository\ActivitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitiesRepository::class)]
class Activities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $activity_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $first_day = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $second_day = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $third_day = null;

    #[ORM\Column]
    private ?int $max_people_nbr = null;

    #[ORM\OneToMany(mappedBy: 'activity_id', targetEntity: Planification::class)]
    private Collection $planifications;

    public function __construct()
    {
        $this->planifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityName(): ?string
    {
        return $this->activity_name;
    }

    public function setActivityName(string $activity_name): self
    {
        $this->activity_name = $activity_name;

        return $this;
    }

    public function getFirstDay(): ?\DateTimeInterface
    {
        return $this->first_day;
    }

    public function setFirstDay(\DateTimeInterface $first_day): self
    {
        $this->first_day = $first_day;

        return $this;
    }

    public function getSecondDay(): ?\DateTimeInterface
    {
        return $this->second_day;
    }

    public function setSecondDay(?\DateTimeInterface $second_day): self
    {
        $this->second_day = $second_day;

        return $this;
    }

    public function getThirdDay(): ?\DateTimeInterface
    {
        return $this->third_day;
    }

    public function setThirdDay(?\DateTimeInterface $third_day): self
    {
        $this->third_day = $third_day;

        return $this;
    }

    public function getMaxPeopleNbr(): ?int
    {
        return $this->max_people_nbr;
    }

    public function setMaxPeopleNbr(int $max_people_nbr): self
    {
        $this->max_people_nbr = $max_people_nbr;

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
            $planification->setActivityId($this);
        }

        return $this;
    }

    public function removePlanification(Planification $planification): self
    {
        if ($this->planifications->removeElement($planification)) {
            // set the owning side to null (unless already changed)
            if ($planification->getActivityId() === $this) {
                $planification->setActivityId(null);
            }
        }

        return $this;
    }
}
