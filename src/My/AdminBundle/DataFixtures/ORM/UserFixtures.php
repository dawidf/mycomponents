<?php
/**
 * Created by PhpStorm.
 * User: ssss
 * Date: 02.08.15
 * Time: 12:29
 */

namespace My\AdminBundle\DataFixtures\ORM;



use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\UserBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $usersList = array();
        for($i = 1; $i < 11; $i++)
        {
            $usersList[$i]['name'] = 'admin'.$i;
            $usersList[$i]['email'] = 'admin'.$i.'@admin.pl';
            $usersList[$i]['enabled'] = true;
            $usersList[$i]['roles'] = $i % 2 == 0 ? 'ROLE_SUPER_ADMIN' : 'ROLE_ADMIN';
        }

        foreach($usersList as $user)
        {
            $User = new User();

            $User->setUsername($user['name']);
            $User->setEmail($user['email']);
            $User->setPlainPassword($user['name']);
            $User->setEnabled(true);
            $User->setRoles(array($user['roles']));

            $this->addReference('user-'.$user['name'], $User);

            $manager->persist($User);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 0;
    }


}