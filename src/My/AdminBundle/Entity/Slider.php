<?php

namespace My\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity(repositoryClass="My\AdminBundle\Entity\SliderRepository")
 */
class Slider
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;
    /**
     * @var UploadedFile
     * @Assert\Image(minWidth=50, maxWidth=150, minHeight="50", maxHeight="150",
     * maxSize="5M"
     * )
     */
    private $updateImage;


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
     * Set image
     *
     * @param string $image
     * @return Slider
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
