<?php

namespace My\AdminBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class AdminExtension extends \Twig_Extension
{
    private $environment;
    private $tokenStorage;
    private $containerInterface;
    private $authorizationChecker;

    /**
     * AdminExtension constructor.
     * @param ContainerInterface $containerInterface
     * @param TokenStorage $tokenStorage
     * @param AuthorizationChecker $authorizationChecker
     */
    public function __construct( ContainerInterface $containerInterface,
                                 TokenStorage $tokenStorage,
                                 AuthorizationChecker $authorizationChecker )
    {
        $this->containerInterface = $containerInterface;
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('print_user_profile_menu', array($this, 'printUserProfileMenu'), array('is_safe' => array('html')))
        );
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'my_admin_extension';
    }

    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    public function printUserProfileMenu()
    {

        return $this->environment->render('MyAdminBundle:Template:printUserProfileMenu.html.twig', array(
            'user' => $this->tokenStorage->getToken()->getUser()
        ));
    }
}
