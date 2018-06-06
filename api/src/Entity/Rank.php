<?php
// api/src/Entity/Rank.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * A Rank.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Rank
{
    /**
     * @var int The id of this rank.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }
}

