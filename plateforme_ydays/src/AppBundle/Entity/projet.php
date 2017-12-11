<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var bool
     *
     * @ORM\Column(name="projet_ext_ou_int", type="boolean")
     */
    private $projetExtOuInt;

    /**
     * @var bool
     *
     * @ORM\Column(name="ydays_perso", type="boolean")
     */
    private $ydaysPerso;

    /**
     * @var int
     *
     * @ORM\Column(name="status_evaluations", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\StatusEvaluation", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $statusEvaluations;

    /**
     * @var bool
     *
     * @ORM\Column(name="archiver", type="boolean")
     */
    private $archiver;

    /**
     * @var int
     * 
     * @ORM\Column(name="id_utilisateur", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilisateurs;

    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur1", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $idUtilisateurs1;

    /**
     * @var int
     *
     * @ORM\Column(name="id_entreprise", type="integer", nullable=true)
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEntreprises;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return projet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set projetExtOuInt
     *
     * @param boolean $projetExtOuInt
     *
     * @return projet
     */
    public function setProjetExtOuInt($projetExtOuInt)
    {
        $this->projetExtOuInt = $projetExtOuInt;

        return $this;
    }

    /**
     * Get projetExtOuInt
     *
     * @return bool
     */
    public function getProjetExtOuInt()
    {
        return $this->projetExtOuInt;
    }

    /**
     * Set ydaysPerso
     *
     * @param boolean $ydaysPerso
     *
     * @return projet
     */
    public function setYdaysPerso($ydaysPerso)
    {
        $this->ydaysPerso = $ydaysPerso;

        return $this;
    }

    /**
     * Get ydaysPerso
     *
     * @return bool
     */
    public function getYdaysPerso()
    {
        return $this->ydaysPerso;
    }

    /**
     * Set statusEvaluations
     *
     * @param string $statusEvaluations
     *
     * @return projet
     */
    public function setStatusEvaluations($statusEvaluations)
    {
        $this->statusEvaluations = $statusEvaluations;

        return $this;
    }

    /**
     * Get statusEvaluations
     *
     * @return string
     */
    public function getStatusEvaluations()
    {
        return $this->statusEvaluations;
    }

    /**
     * Set archiver
     *
     * @param boolean $archiver
     *
     * @return projet
     */
    public function setArchiver($archiver)
    {
        $this->archiver = $archiver;

        return $this;
    }

    /**
     * Get archiver
     *
     * @return bool
     */
    public function getArchiver()
    {
        return $this->archiver;
    }

    /**
     * Set idUtilisateurs
     *
     * @param integer $idUtilisateurs
     *
     * @return projet
     */
    public function setIdUtilisateurs($idUtilisateurs)
    {
        $this->idUtilisateurs = $idUtilisateurs;

        return $this;
    }

    /**
     * Get idUtilisateurs
     *
     * @return int
     */
    public function getIdUtilisateurs()
    {
        return $this->idUtilisateurs;
    }

    /**
     * Set idUtilisateurs1
     *
     * @param integer $idUtilisateurs1
     *
     * @return projet
     */
    public function setIdUtilisateurs1($idUtilisateurs1)
    {
        $this->idUtilisateurs1 = $idUtilisateurs1;

        return $this;
    }

    /**
     * Get idUtilisateurs1
     *
     * @return int
     */
    public function getIdUtilisateurs1()
    {
        return $this->idUtilisateurs1;
    }

    /**
     * Set idEntreprises
     *
     * @param integer $idEntreprises
     *
     * @return projet
     */
    public function setIdEntreprises($idEntreprises)
    {
        $this->idEntreprises = $idEntreprises;

        return $this;
    }

    /**
     * Get idEntreprises
     *
     * @return int
     */
    public function getIdEntreprises()
    {
        return $this->idEntreprises;
    }
}

