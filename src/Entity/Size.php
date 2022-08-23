<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PizzaRepository::class)
 */
class Size
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=2)
   */
  private $size;

  /**
   * @ORM\Column(type="string", length=20)
   */

  public function getId(): ?int
  {
      return $this->id;
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
