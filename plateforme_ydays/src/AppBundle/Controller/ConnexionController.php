<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Utilisateur;
use Symfony\Component\Security\Core\SecurityContext;

class ConnexionController extends Controller
{
    /**
     * @Route("/", name="connexion")
     */
    public function indexAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('connexion/connexion.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/verif", name="authentification")
     */
    public function verifAction(Request $request)
    {
        $username = "Erwann";

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:Utilisateur')->find($username);

        $response = $this->forward('AppBundle:Dashboard:index', array(
        'user'  => $user,
        ));

        return $response;
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm('AppBundle\Form\UtilisateurType', $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();

            return $this->redirectToRoute('connexion', array('id' => $utilisateur->getId()));
        }

        return $this->render('utilisateur/new.html.twig', array(
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ));
    }

}
