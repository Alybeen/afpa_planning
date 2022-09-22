<?php

namespace App\Entity;

use App\Repository\DisponibilityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisponibilityRepository::class)]
class Disponibility
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dispo_start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dispo_end = null;

    #[ORM\ManyToOne(inversedBy: 'disponibilities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDispoStart(): ?\DateTimeInterface
    {
        return $this->dispo_start;
    }

    public function setDispoStart(\DateTimeInterface $dispo_start): self
    {
        $this->dispo_start = $dispo_start;

        return $this;
    }

    public function getDispoEnd(): ?\DateTimeInterface
    {
        return $this->dispo_end;
    }

    public function setDispoEnd(\DateTimeInterface $dispo_end): self
    {
        $this->dispo_end = $dispo_end;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user;
    }

    public function setUserId(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

}
