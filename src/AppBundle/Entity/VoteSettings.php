<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * VoteSettings
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\VoteSettingsRepository")
 */
class VoteSettings
{
    use GedmoTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titleH1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $address;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="vote_limits", type="integer", nullable=false)
     */
    private $voteLimits;

    /**
     * @var Project[]ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Project", mappedBy="voteSetting", cascade={"persist"})
     */
    private $project;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="date_from", type="datetime", nullable=false)
     */
    private $dateFrom;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="date_to", type="datetime", nullable=false)
     */
    private $dateTo;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;    

    /**
     * @var City
     *
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="City", inversedBy="voteSetting")
     * @ORM\JoinColumn(name="location_id", nullable = true, referencedColumnName="id")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name = "background_img", type="string", length=255, nullable=true)
     */
    private $backgroundImg;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titleH1
     *
     * @param string $titleH1
     *
     * @return VoteSettings
     */
    public function setTitleH1($titleH1)
    {
        $this->titleH1 = $titleH1;

        return $this;
    }

    /**
     * Get titleH1
     *
     * @return string
     */
    public function getTitleH1()
    {
        return $this->titleH1;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return VoteSettings
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
     * Set address
     *
     * @param string $address
     *
     * @return VoteSettings
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set voteLimits
     *
     * @param integer $voteLimits
     *
     * @return VoteSettings
     */
    public function setVoteLimits($voteLimits)
    {
        $this->voteLimits = $voteLimits;

        return $this;
    }

    /**
     * Get voteLimits
     *
     * @return integer
     */
    public function getVoteLimits()
    {
        return $this->voteLimits;
    }

    /**
     * Set dateFrom
     *
     * @param \DateTime $dateFrom
     *
     * @return VoteSettings
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    /**
     * Get dateFrom
     *
     * @return \DateTime
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * Set dateTo
     *
     * @param \DateTime $dateTo
     *
     * @return VoteSettings
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    /**
     * Get dateTo
     *
     * @return \DateTime
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return VoteSettings
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
     * Set logo
     *
     * @param string $logo
     *
     * @return VoteSettings
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set backgroundImg
     *
     * @param string $backgroundImg
     *
     * @return VoteSettings
     */
    public function setBackgroundImg($backgroundImg)
    {
        $this->backgroundImg = $backgroundImg;

        return $this;
    }

    /**
     * Get backgroundImg
     *
     * @return string
     */
    public function getBackgroundImg()
    {
        return $this->backgroundImg;
    }

    /**
     * Add project
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return VoteSettings
     */
    public function addProject(\AppBundle\Entity\Project $project)
    {
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \AppBundle\Entity\Project $project
     */
    public function removeProject(\AppBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return Collection
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    /**
     * Set location
     *
     * @param \AppBundle\Entity\City $location
     *
     * @return VoteSettings
     */
    public function setLocation(\AppBundle\Entity\City $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \AppBundle\Entity\City
     */
    public function getLocation()
    {
        return $this->location;
    }
}
