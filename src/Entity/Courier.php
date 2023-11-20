<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CourierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourierRepository::class)]
#[ApiResource]
class Courier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'couriers')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: CourierOwner::class)]
    private Collection $courierOwners;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->courierOwners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        $this->users->removeElement($user);

        return $this;
    }

    /**
     * @return Collection<int, CourierOwner>
     */
    public function getCourierOwners(): Collection
    {
        return $this->courierOwners;
    }

    public function addCourierOwner(CourierOwner $courierOwner): static
    {
        if (!$this->courierOwners->contains($courierOwner)) {
            $this->courierOwners->add($courierOwner);
        }

        return $this;
    }

    public function removeCourierOwner(CourierOwner $courierOwner): static
    {
        $this->courierOwners->removeElement($courierOwner);

        return $this;
    }
}
