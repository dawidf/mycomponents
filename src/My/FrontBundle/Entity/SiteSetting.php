<?php

namespace My\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteSetting
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="My\FrontBundle\Entity\SiteSettingRepository")
 */
class SiteSetting
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
    private $title;
    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
