<?php

namespace My\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteSetting
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="My\AdminBundle\Entity\SiteSettingRepository")
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
    private $option;
    /**
     * @ORM\Column(type="string")
     */
    private $value;

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
     * Set option
     *
     * @param string $option
     * @return SiteSetting
     */
    public function setOption($option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return string 
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return SiteSetting
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}
