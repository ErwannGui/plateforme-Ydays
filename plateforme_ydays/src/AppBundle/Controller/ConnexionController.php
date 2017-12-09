<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;

class ConnexionController extends Controller
{
    /**
     */
    public function indexAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('connexion/connexion.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/verif", name="test")
     */
     public function verifAction()
    {

        /*// On crée un objet Advert
        $advert = new Response();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $advert);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
          ->add('date',      DateType::class)
          ->add('title',     TextType::class)
          ->add('content',   TextareaType::class)
          ->add('author',    TextType::class)
          ->add('published', CheckboxType::class)
          ->add('save',      SubmitType::class)
        ;
        // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('connexion/add.html.twig', array(
          'form' => $form->createView(),
        ));*/

        $nom = "toto";
        return $this->createQueryBuilder('test')
                    ->where("nom = ?1")
                    ->setParameter(1, $nom)
                    ->getQuery()
                    ->getResult();

        /*$identifiant = $form->get('identifiant')->getData();
        return $identifiant;

        $rawSql = "SELECT * FROM plateforme.test";

        $stmt = $this->getEntityManager()->getConnection()->prepare($rawSql);
        $stmt->execute([]);

        return $stmt->fetchAll();*/
    }
}
