<?php
/**
 @author Groupe 5 <https://github.com/ErwannGui/plateforme-Ydays>
 @copyright 2017 Groupe 5
 @version 1.0
*/
namespace AppBundle\Controller;

use AppBundle\Entity\Rapport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Rapport controller.
 *
 * @Route("rapport")
 */
class RapportController extends Controller
{
    /**
     * Lists all rapport entities.
     *
     * @Route("/", name="rapport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rapports = $em->getRepository('AppBundle:Rapport')->findAll();

        return $this->render('rapport/index.html.twig', array(
            'rapports' => $rapports,
        ));
    }

    /**
     * Finds and displays a rapport entity.
     *
     * @Route("/{id}", name="rapport_show")
     * @Method("GET")
     */
    public function showAction(Rapport $rapport)
    {

        return $this->render('rapport/show.html.twig', array(
            'rapport' => $rapport,
        ));
    }
}
