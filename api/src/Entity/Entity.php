<?php
// api/src/Entity/Entity.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * A Entity.
 *
 * @ORM\Entity
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"method"="GET", "path"="/entities"},
 *          "post"={"method"="POST", "path"="/entities", "access_control"="is_granted('ROLE_ADMIN')"},
 *     },
 *     itemOperations={
 *          "get"={"method"="GET", "path"="/entities/{id}"},
 *          "patch"={"method"="PATCH", "path"="/entities/{id}"},
 *          "delete"={"method"="DELETE", "path"="/entities/{id}", "access_control"="is_granted('ROLE_ADMIN')"},
 *     }
 * )
 */
class Entity
{
    /**
     * @var int The id of this entity.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * The Wikidata number of the entity
     *
     * @var int
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="qwd", type="integer", unique=true)
     */
    private $qwd;

    /**
     * The URL of the artwork's image
     *
     * @var string
     * @Assert\NotBlank()
     * @Assert\Url()
     *
     * @ORM\Column(name="image", type="text", nullable=false)
     */
    private $image;

    /**
     * The Labels of the entity related to the depict
     *
     * @var array
     *
     * @ORM\Column(name="labels", type="array", nullable=true)
     */
    private $labels;

    /**
     * Keywords are used to find collections or artwork
     *
     * @var array
     *
     * @ORM\Column(name="keywords", type="array", nullable=true)
     */
    private $keywords;

    /**
     * The status of submission
     *
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var Depict[] Available depicts for this entity.
     *
     * @ORM\OneToMany(targetEntity="Depict", mappedBy="entity")
     */
    public $depicts;

    /**
     * @var Log[] Available logs for this entity.
     *
     * @ORM\OneToMany(targetEntity="Log", mappedBy="entity")
     */
    public $logs;

    public function __construct() {
        $this->depicts = new ArrayCollection();
        $this->logs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

