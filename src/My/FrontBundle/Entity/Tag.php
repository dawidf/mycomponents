<?php

namespace My\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="My\FrontBundle\Entity\TagRepository")
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=125)
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="My\FrontBundle\Entity\Work", mappedBy="tags")
     */
    private $work;

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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->work = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add work
     *
     * @param \My\FrontBundle\Entity\Work $work
     * @return Tag
     */
    public function addWork(\My\FrontBundle\Entity\Work $work)
    {
        $this->work[] = $work;

        return $this;
    }

    /**
     * Remove work
     *
     * @param \My\FrontBundle\Entity\Work $work
     */
    public function removeWork(\My\FrontBundle\Entity\Work $work)
    {
        $this->work->removeElement($work);
    }

    /**
     * Get work
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWork()
    {
        return $this->work;
    }
}
