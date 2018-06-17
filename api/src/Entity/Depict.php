<?php
// api/src/Entity/Depict.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * A Depict.
 *
 * @ORM\Entity
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"method"="GET", "path"="/depicts"},
 *          "post"={"method"="POST", "path"="/depicts"},
 *     },
 *     itemOperations={
 *          "get"={"method"="GET", "path"="/depicts/{id}"},
 *          "patch"={"method"="PATCH", "path"="/depicts/{id}"},
 *          "delete"={"method"="DELETE", "path"="/depicts/{id}"},
 *     }
 * )
 */
class Depict
{
    /**
     * @var int The id of this depict.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Entity The entity this depict is about.
     *
     * @ORM\ManyToOne(targetEntity="Entity", inversedBy="depicts")
     */
    public $entity;

    /**
     * The Wikidata number of the entity
     *
     * @var int
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="qwd", type="integer", unique=true)
     */
    public $qwd;

    /**
     * The Labels of the entity related to the depict
     *
     * @var array
     *
     * @ORM\Column(name="labels", type="array", nullable=true)
     */
    public $labels;

    /**
     * The status of submission
     *
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    public $status;


    public function getId(): ?int
    {
        return $this->id;
    }
}

