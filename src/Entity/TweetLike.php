<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TweetLikeRepository")
 * @ApiResource()
 */
class TweetLike
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TweetMessage", inversedBy="likes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Message;

    public function getId()
    {
        return $this->id;
    }

    public function getMessage(): ?TweetMessage
    {
        return $this->Message;
    }

    public function setMessage(?TweetMessage $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->id;
    }
}
