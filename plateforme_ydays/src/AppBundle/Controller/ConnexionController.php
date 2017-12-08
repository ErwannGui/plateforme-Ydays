<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConnexionController extends Controller
{
    /**
     * @Route("/", name="connexion")
     */
    public function indexAction(Request $request)
    {
        // Récupération de la session
        $session = $request->getSession();
        
        // On récupère le contenu de la variable user_id
        $userId = $session->get('user_id');

        // On définit une nouvelle valeur pour cette variable user_id
        $session->set('user_id', 91);

        // replace this example code with whatever you need
        return $this->render('connexion/connexion.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

     public function addAction(Request $request)
    {
        
    }
}
