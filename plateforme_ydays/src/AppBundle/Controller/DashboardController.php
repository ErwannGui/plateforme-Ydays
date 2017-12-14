<?php
/**
 @author Groupe 5 <https://github.com/ErwannGui/plateforme-Ydays>
 @copyright 2017 Groupe 5
 @version 1.0
*/
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Projet;
use AppBundle\Entity\Entreprise;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Rapport;
/* Import de toutes les dépendances nécessaires à la construction de nos vues et de nos requêtes */

/**
 * Dashboard controller
 * On définit une route de base pour ce controller
 * @Route("dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     * On rajoute une partie d'url spécifique pour se lier à la fonction et un nom à cette route afin de la réutiliser plus tard
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser()->getId(); // Recupère l'id de l'utilisateur connecté

        $em_u = $this->getDoctrine()->getManager();
        $users = $em_u->getRepository('AppBundle:Utilisateur')->find($user);
        /* Récupère l'occurence en base de donnée de l'utilisateur filtré par Id */

        $em_c = $this->getDoctrine()->getManager();
        $commentaires = $em_c->getRepository('AppBundle:Commentaire')->findAll();

        $em_r = $this->getDoctrine()->getManager();
        $rapports = $em_r->getRepository('AppBundle:Rapport')->findAll();

        $em_p = $this->getDoctrine()->getManager();
        $projets = $em_p->getRepository('AppBundle:Projet')->findAll();

        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            // Si l'utilisateur à les droits d'administrateur, on lie les données récupérées des requêtes vers la vue concernée

            return $this->render('dashboard/admin.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projets' => $projets, 'commentaires' => $commentaires, 'rapports' => $rapports, 'users' => $users,
            ]);
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès autorisé uniquement pour les administrateurs.');
        }

        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {

            // Si l'utilisateur est un simple utilisateur, on réalise le mêm envoi de données

            return $this->render('dashboard/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projets' => $projets, 'commentaires' => $commentaires, 'rapports' => $rapports, 'users' => $users,
            ]);
        }
    }

    /**
     * @Route("/projet/{id}", name="projet")
     */
    public function projetAction(Request $request, Projet $projet)
    {
        
        /* On désire afficher la page spécifique à un projet */

        $user = $this->getUser();

        $em_u = $this->getDoctrine()->getManager();
        $users = $em_u->getRepository('AppBundle:Utilisateur')->find($user);

        $em_p = $this->getDoctrine()->getManager();
        $data_projet = $em_p->getRepository('AppBundle:Projet')->find($projet);

        $em_c = $this->getDoctrine()->getManager();
        $commentaires = $em_c->getRepository('AppBundle:Commentaire')->findAll();

        $em_r = $this->getDoctrine()->getManager();
        $rapports = $em_r->getRepository('AppBundle:Rapport')->findAll();

        return $this->render('dashboard/projet.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projet' => $data_projet, 'commentaires' => $commentaires, 'rapports' => $rapports, 'user' => $user,
        ]);
    }

    /** Le reste des fonctions est selon moi aussez implicite **/

	/**
     * @Route("/listprojet", name="list_projet")
     */
    public function listProjetAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository('AppBundle:Projet')->findAll();

        return $this->render('dashboard/listprojet.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projets' => $projets,
        ]);
    }

    /**
     * @Route("/listEntreprise", name="list_entreprise")
     * On définit des droits spécifiques à cette route afin d'en limiter l'accès
     * @Security("has_role('ROLE_HELPER')")
     */
    public function listEntrepriseAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $entreprises = $em->getRepository('AppBundle:Entreprise')->findAll();

        return $this->render('dashboard/listentreprise.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'entreprises' => $entreprises,
        ]);
    }

    /**
     * @Route("/listUtilisateur", name="list_utilisateur")
     */
    public function listUtilisateurAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository('AppBundle:Utilisateur')->findAll();

        return $this->render('dashboard/listutilisateur.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'utilisateurs' => $utilisateurs,
        ]);
    }

    /**
     * Creates a new projet entity.
     *
     * @Route("/admin/newProjet", name="projet_new")
     * @Method({"GET", "POST"})
     */
    public function newProjetAction(Request $request)
    {
        /* On désire créer un nouveau projet, on importe donc l'entité liée à notre bdd */
        $projet = new Projet();
        $form = $this->createForm('AppBundle\Form\ProjetType', $projet); //On génere un nouveau formulaire à l'aide du Form Type fourni lors de l'intallation
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();
            /* On effectue ici le traitement des données retournées et on configure la redirection */

            return $this->redirectToRoute('list_projet');
        }

        /* Puis on génere la vue incluant le formulaire */
        return $this->render('projet/new.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new entreprise entity.
     *
     * @Route("/admin/newEntreprise", name="entreprise_new")
     * @Method({"GET", "POST"})
     */
    public function newEntrepriseAction(Request $request)
    {
        $entreprise = new Entreprise();
        $form = $this->createForm('AppBundle\Form\EntrepriseType', $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entreprise);
            $em->flush();

            return $this->redirectToRoute('list_entreprise');
        }

        return $this->render('entreprise/new.html.twig', array(
            'entreprise' => $entreprise,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new utilisateur entity.
     *
     * @Route("/admin/newUtilisateur", name="entreprise_new")
     * @Method({"GET", "POST"})
     */
    public function newUtilisateurAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm('AppBundle\Form\UtilisateurType', $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();

            return $this->redirectToRoute('list_utilisateur');
        }

        return $this->render('utilisateur/new.html.twig', array(
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing projet entity.
     *
     * @Route("/listprojet/edit/{id}", name="projet_edit")
     * @Method({"GET", "POST"})
     */
    public function editProjetAction(Request $request, Projet $projet)
    {
        /* On créé un formualire de modification d'une entité, et de suppression */
        $deleteForm = $this->createDeletePrjForm($projet);
        $editForm = $this->createForm('AppBundle\Form\ProjetType', $projet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projet_edit', array('id' => $projet->getId()));
        }

        /* Même principe qu'avec le formulaire de création, on envoie nos différents formulaires */
        return $this->render('projet/edit.html.twig', array(
            'projet' => $projet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing entreprise entity.
     *
     * @Route("/admin/listEntreprise/edit/{id}", name="entreprise_edit")
     * @Method({"GET", "POST"})
     */
    public function editEntrepriseAction(Request $request, Entreprise $entreprise)
    {
        $deleteForm = $this->createDeleteEnpForm($entreprise);
        $editForm = $this->createForm('AppBundle\Form\EntrepriseType', $entreprise);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entreprise_edit', array('id' => $entreprise->getId()));
        }

        return $this->render('entreprise/edit.html.twig', array(
            'entreprise' => $entreprise,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing utilisateur entity.
     *
     * @Route("/admin/listUtilisateur/edit/{id}", name="utilisateur_edit")
     * @Method({"GET", "POST"})
     */
    public function editUtiisateurAction(Request $request, Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteUsrForm($utilisateur);
        $editForm = $this->createForm('AppBundle\Form\UtilisateurType', $utilisateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateur_edit', array('id' => $utilisateur->getId()));
        }

        return $this->render('utilisateur/edit.html.twig', array(
            'utilisateur' => $utilisateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projet entity.
     *
     * @Route("/admin/listProjet/delete/{id}", name="projet_delete")
     * @Method("DELETE")
     */
    public function deleteProjetAction(Request $request, Projet $projet)
    {
        $form = $this->createDeletePrjForm($projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projet);
            $em->flush();
        }

        return $this->redirectToRoute('list_projet');
    }

    /**
     * Deletes a entreprise entity.
     *
     * @Route("/admin/listEntreprise/delete/{id}", name="entreprise_delete")
     * @Method("DELETE")
     */
    public function deleteEntrepriseAction(Request $request, Entreprise $entreprise)
    {
        $form = $this->createDeleteEnpForm($projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projet);
            $em->flush();
        }

        return $this->redirectToRoute('list_entreprise');
    }

    /**
     * Deletes a utilisateur entity.
     *
     * @Route("/admin/listUtilisateur/delete/{id}", name="utilisateur_delete")
     * @Method("DELETE")
     */
    public function deleteUtilisateurAction(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createDeleteUsrForm($utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilisateur);
            $em->flush();
        }

        return $this->redirectToRoute('list_utilisateur');
    }

    /**
     * Creates a form to delete a projet entity.
     *
     * @param Projet $projet The projet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeletePrjForm(Projet $projet)
    {
        /* On créé un nouveau formulaire sur la base de la fonction importée de Symfony */
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projet_delete', array('id' => $projet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Creates a form to delete a projet entity.
     *
     * @param Entreprise $entreprise The projet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteEnpForm(Entreprise $entreprise)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entreprise_delete', array('id' => $entreprise->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Creates a form to delete a projet entity.
     *
     * @param Utilisateur $utilisateur The projet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteUsrForm(Utilisateur $utilisateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateur_delete', array('id' => $utilisateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /* Nous avons modifié les vues pour la connexion et l'enregistrement dans FOSUserBundle, ainsi que le formulaire type pour l'enregistrement */

}
