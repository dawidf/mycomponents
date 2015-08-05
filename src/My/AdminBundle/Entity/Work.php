<?php

namespace My\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table(name="works")
 * @ORM\Entity(repositoryClass="My\AdminBundle\Entity\WorkRepository")
 */
class Work extends AbstractItem
{

    /**
     * @ORM\ManyToOne(targetEntity="My\AdminBundle\Entity\Tag", inversedBy="work")
     * @ORM\JoinColumn(name="work_id", referencedColumnName="id")
     */
    private $tags;

   



    /**
     * Set tags
     *
     * @param \My\AdminBundle\Entity\Work $tags
     * @return Work
     */
    public function setTags(\My\AdminBundle\Entity\Work $tags = null)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \My\AdminBundle\Entity\Work 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
