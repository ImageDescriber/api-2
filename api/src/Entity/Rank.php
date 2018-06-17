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
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"method"="GET", "path"="/ranks"},
 *          "post"={"method"="POST", "path"="/ranks"},
 *     },
 *     itemOperations={
 *          "get"={"method"="GET", "path"="/ranks/{id}"},
 *          "patch"={"method"="PATCH", "path"="/ranks/{id}"},
 *          "delete"={"method"="DELETE", "path"="/ranks/{id}", "access_control"="is_granted('ROLE_ADMIN')"},
 *     }
 * )
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

