<?php
/**
 @author Groupe 5 <https://github.com/ErwannGui/plateforme-Ydays>
 @copyright 2017 Groupe 5
 @version 1.0
*/
namespace AppBundle\Controller;

use AppBundle\Entity\Statut_usr;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Statut_usr controller.
 *
 * @Route("statut_usr")
 */
class Statut_usrController extends Controller
{
    /**
     * Lists all statut_usr entities.
     *
     * @Route("/", name="statut_usr_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statut_usrs = $em->getRepository('AppBundle:Statut_usr')->findAll();

        return $this->render('statut_usr/index.html.twig', array(
            'statut_usrs' => $statut_usrs,
        ));
    }

    /**
     * Finds and displays a statut_usr entity.
     *
     * @Route("/{id}", name="statut_usr_show")
     * @Method("GET")
     */
    public function showAction(Statut_usr $statut_usr)
    {

        return $this->render('statut_usr/show.html.twig', array(
            'statut_usr' => $statut_usr,
        ));
    }
}
