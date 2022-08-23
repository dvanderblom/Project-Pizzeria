<?php

namespace App\Entity;

use App\Repository\RoomsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomsRepository::class)
 */
class Rooms
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $booked;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $size;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBooked(): ?string
    {
        return $this->booked;
    }

    public function setBooked(string $booked): self
    {
        $this->booked = $booked;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }
}
