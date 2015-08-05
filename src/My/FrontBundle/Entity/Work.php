<?php

namespace My\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table(name="works")
 * @ORM\Entity(repositoryClass="My\FrontBundle\Entity\WorkRepository")
 */
class Work extends AbstractItem
{

    /**
     * @ORM\ManyToOne(targetEntity="My\FrontBundle\Entity\Work", inversedBy="tags")
     * @ORM\JoinColumn(name="work_id", referencedColumnName="id")
     */
    private $tags;




    /**
     * Set tags
     *
     * @param \My\FrontBundle\Entity\Work $tags
     * @return Work
     */
    public function setTags(\My\FrontBundle\Entity\Work $tags = null)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \My\FrontBundle\Entity\Work 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
