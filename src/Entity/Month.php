<?php

namespace App\Entity;

use App\Repository\MonthRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonthRepository::class)
 */
class Month
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="array")
     */
    private $countOfDays;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCurrent;

    public function __construct(string $name, array $countOfDays, bool $isCurrent)
    {
        $this->name=$name;
        $this->countOfDays=$countOfDays;
        $this->isCurrent=$isCurrent;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountOfDays(): array
    {
        return $this->countOfDays;
    }

    public function setCountOfDays(array $countOfDays): self
    {
        $this->countOfDays = $countOfDays;

        return $this;
    }

    public function getIsCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function setIsCurrent(bool $isCurrent): self
    {
        $this->isCurrent = $isCurrent;

        return $this;
    }
}
