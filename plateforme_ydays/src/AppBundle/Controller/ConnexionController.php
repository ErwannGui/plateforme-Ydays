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
}
