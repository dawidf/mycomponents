<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 01.08.15
 * Time: 19:46
 */

namespace My\UserBundle\Entity;


use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUsers()
    {
        $qb = $this->createQueryBuilder('userRepository')
            ->select('userRepository.username, userRepository.email,
            userRepository.lastLogin, userRepository.locked,
            userRepository.roles');
        ;

        return $qb->getQuery()->getArrayResult();
    }
}