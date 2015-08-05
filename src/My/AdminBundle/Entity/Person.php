<?php

namespace My\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 * @ORM\Table(name="persons")
 * @ORM\Entity(repositoryClass="My\AdminBundle\Entity\PersonRepository")
 */
class Person extends AbstractItem
{
    protected $socialLinks;
}
