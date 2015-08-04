<?php

namespace My\AdminBundle\Controller;

use My\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class DashboardController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {

        return array(
            'asd' => 'asd'
        );
    }

    /**
     * @Route("/users", name="user_list")
     * @Template()
     */
    public function usersAction()
    {


        $em = $this->getDoctrine()->getRepository('MyUserBundle:User');
        $users = $em->getUsers();

        $deleteForm = $this->createDeleteForm();

        if($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'))
        {
            $csrfProvider = $this->get('form.csrf_provider');

        }


        return array(
            'users' => $users,
            'csrfProvider' => isset($csrfProvider) ? $csrfProvider : null,
            'tokenName' => 'delUser%d'
        );
    }

    /**
     * @Route("/delete-user/{id}/{token}", name="delete_user")
     */
    public function deleteUserAction($id, $token)
    {
        if(false === $this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'))
        {
            throw $this->createAccessDeniedException('Nie masz uprawnień do wykonania tej akcji');
        }

        $validToken = sprintf('delUser%d', $id);
        if(!$this->get('form.csrf_provider')->isCsrfTokenValid($validToken, $token))
        {
            throw $this->createAccessDeniedException('Błędny token akcji');
        }

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('MyUserBundle:User')->find($id);

            if(!$user)
            {
                throw $this->createNotFoundException('Nie znaleziono takiego użytkownika');
            }

            $em->remove($user);
            $em->flush();

            return new JsonResponse(array(
                'status' => 'ok',
                'message' => 'Użytkownik został usunięty'
            ));

        return new Response('asd');
//        return new JsonResponse(array(
//            'status' => 'error',
//            'message' => 'Form validation failed'
//        ));
    }


    /**
     * @param $id
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($id = null)
    {
        if($id === null)
        {
            return $this->createFormBuilder()
                ->setMethod('DELETE')
                ->add('submit', 'submit', array(
                    'attr' => array(
                        'class' => 'delete-user'
                    )
                ))

                ->getForm()
            ;
        }
        else
        {
            return $this->createFormBuilder()

                ->setAction($this->generateUrl('delete_user', array('id' => $id)))
                ->setMethod('DELETE')
                ->add('submit', 'submit', array(
                    'attr' => array(
                        'class' => 'delete-user'
                    )
                ))
                ->getForm()
            ;
        }

    }
}
