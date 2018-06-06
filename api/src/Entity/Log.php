<?php
// api/src/Entity/Log.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * A Log.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Log
{
    /**
     * @var int The id of this log.
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
     * @var string
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Choice({"create", "update", "updateDepicts", "nothingToAdd", "pass"})
     *
     * @ORM\Column(name="status", type="string")
     */
    private $status;

    /**
     * @var string
     * @Assert\Ip
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=true)
     */
    protected $ip;

    public function getId(): ?int
    {
        return $this->id;
    }
}

