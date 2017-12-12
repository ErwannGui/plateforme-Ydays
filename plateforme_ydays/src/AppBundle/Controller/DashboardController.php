<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Projet;
use AppBundle\Entity\Entreprise;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Rapport;
use AppBundle\Entity\Rapport;

/**
 * Dashboard controller
 *
 * @Route("dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction(Request $request)
    {

        /*if ($this->getUser()->isGranted('ROLE_ADMIN')) {

            $em_c = $this->getDoctrine()->getManager();
            $commentaires = $em_c->getRepository('AppBundle:Commentaire')->findAll();

            $em_r = $this->getDoctrine()->getManager();
            $rapports = $em_r->getRepository('AppBundle:Rapport')->findAll();

            return $this->render('dashboard/admin.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projets' => $projets, 'commentaires' => $commentaires, 'rapports' => $rapports, 'statut' => $statut,
            ]);
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès autorisé uniquement pour les administrateurs.');
        }*/

            $em_p = $this->getDoctrine()->getManager();
            $projets = $em_p->getRepository('AppBundle:Projet')->findAll();

            $em_c = $this->getDoctrine()->getManager();
            $commentaires = $em_c->getRepository('AppBundle:Commentaire')->findAll();

            $em_r = $this->getDoctrine()->getManager();
            $rapports = $em_r->getRepository('AppBundle:Rapport')->findAll();

            return $this->render('dashboard/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projets' => $projets, 'commentaires' => $commentaires, 'rapports' => $rapports,
            ]);
    }

    /**
     * @Route("/projet/{id}", name="projet")
     */
    public function projetAction(Request $request, Projet $projet)
    {      
        
        $em_p = $this->getDoctrine()->getManager();
        $data_projet = $em_p->getRepository('AppBundle:Projet')->find($projet);

        $em_c = $this->getDoctrine()->getManager();
        $commentaires = $em_c->getRepository('AppBundle:Commentaire')->findAll();

        $em_r = $this->getDoctrine()->getManager();
        $rapports = $em_r->getRepository('AppBundle:Rapport')->findAll();

        return $this->render('dashboard/projet.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'projet' => $data_projet, 'commentaires' => $commentaires, 'rapports' => $rapports,
        ]);
    }

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
     * @Route("/listentreprise", name="list_entreprise")
     */
    public function listEntrepriseAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $entreprises = $em->getRepository('AppBundle:Entreprise')->findAll();

        return $this->render('dashboard/listentreprise.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'entreprises' => $entreprises,
        ]);
    }

    /**
     * @Route("/listutilisateur", name="list_utilisateur")
     */
    public function listUtilisateurAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository('AppBundle:Entreprise')->findAll();

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
        $projet = new Projet();
        $form = $this->createForm('AppBundle\Form\ProjetType', $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();

            return $this->redirectToRoute('list_projet');
        }

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
        $deleteForm = $this->createDeletePrjForm($projet);
        $editForm = $this->createForm('AppBundle\Form\ProjetType', $projet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projet_edit', array('id' => $projet->getId()));
        }

        return $this->render('projet/edit.html.twig', array(
            'projet' => $projet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing entreprise entity.
     *
     * @Route("/listentreprise/admin/edit/{id}", name="entreprise_edit")
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
     * @Route("/listutilisateur/admin/edit/{id}", name="utilisateur_edit")
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
     * @Route("/listprojet/admin/delete/{id}", name="projet_delete")
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
     * @Route("/listentreprise/admin/delete/{id}", name="entreprise_delete")
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
     * @Route("/listutilisateur/admin/delete/{id}", name="utilisateur_delete")
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
            ->setAction($this->generateUrl('utilisateur_delete', array('id' => $projet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
