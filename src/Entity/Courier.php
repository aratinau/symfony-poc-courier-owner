<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CourierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Deprecated;

#[ORM\Entity(repositoryClass: CourierRepository::class)]
#[ApiResource]
class Courier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Deprecated]
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'couriers')]
    private Collection $users;

    #[ORM\OneToOne(mappedBy: 'courier', cascade: ['persist', 'remove'])]
    private ?CourierOwner $courierOwner = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    public function getCourierOwner(): ?CourierOwner
    {
        return $this->courierOwner;
    }

    public function setCourierOwner(CourierOwner $courierOwner): static
    {
        // set the owning side of the relation if necessary
        if ($courierOwner->getCourier() !== $this) {
            $courierOwner->setCourier($this);
        }

        $this->courierOwner = $courierOwner;

        return $this;
    }
}
