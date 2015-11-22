<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProjectRepository")
 */
class Project
{
    use GedmoTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="confirmedAt", type="datetime", nullable=true)
     */
    private $confirmedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="confirm", type="string", length=255, nullable=true)
     */
    private $confirm;

    /**
     * @var Admin
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Admin", inversedBy="confirmedProjects")
     * @ORM\JoinColumn(name="confirmBy_id", nullable = true, referencedColumnName="id")
     */
    private $confirmedBy;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="projects")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $owner;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="likedProjects")
     */
    private $likedUsers;

    public function __construct()
    {
        $this->likedUsers = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Project
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Set confirmedAt
     *
     * @param \DateTime $confirmedAt
     *
     * @return Project
     */
    public function setConfirmedAt($confirmedAt)
    {
        $this->confirmedAt = $confirmedAt;

        return $this;
    }

    /**
     * Get confirmedAt
     *
     * @return \DateTime
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }

    /*-------------------------------relation methods------------------------------------------------------------------*/
    /**
     * Set confirmedBy
     *
     * @param Admin $confirmedBy
     *
     * @return Project
     */
    public function setConfirmedBy(Admin $confirmedBy = null)
    {
        $this->confirmedBy = $confirmedBy;

        return $this;
    }

    /**
     * Get confirmedBy
     *
     * @return Admin
     */
    public function getConfirmedBy()
    {
        return $this->confirmedBy;
    }

    /**
     * Set owner
     *
     * @param User $owner
     *
     * @return Project
     */
    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add likedUser
     *
     * @param User $likedUser
     *
     * @return Project
     */
    public function addLikedUser(User $likedUser)
    {
        if (!$this->getLikedUsers()->contains($likedUser)) {
            $this->getLikedUsers()->add($likedUser);
            $likedUser->addLikedProject($this);
        }

        return $this;
    }

    /**
     * Remove likedUser
     *
     * @param User $likedUser
     */
    public function removeLikedUser(User $likedUser)
    {
        if ($this->getLikedUsers()->contains($likedUser)) {
            $this->getLikedUsers()->removeElement($likedUser);
        }
    }

    /**
     * Get likedUsers
     *
     * @return Collection
     */
    public function getLikedUsers()
    {
        return $this->likedUsers;
    }

    /**
     * Set confirm
     *
     * @param string $confirm
     *
     * @return Project
     */
    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * Get confirm
     *
     * @return string
     */
    public function getConfirm()
    {
        return $this->confirm;
    }
}
