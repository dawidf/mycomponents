<?php

namespace My\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="persons")
 * @ORM\Entity(repositoryClass="My\FrontBundle\Entity\PersonRepository")
 */
class Person extends AbstractItem
{
    protected $socialLinks;
}
