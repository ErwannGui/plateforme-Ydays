<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteRendu
 *
 * @ORM\Table(name="compte_rendu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompteRenduRepository")
 */
class CompteRendu
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
     * @ORM\Column(name="chemin", type="string", length=255)
     */
    private $chemin;

    /**
     * @var int
     *
     * @ORM\Column(name="id_projet", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Projet", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProjet;


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
     * Set chemin
     *
     * @param string $chemin
     *
     * @return CompteRendu
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;

        return $this;
    }

    /**
     * Get chemin
     *
     * @return string
     */
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * Set idProjet
     *
     * @param string $idProjet
     *
     * @return CompteRendu
     */
    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    /**
     * Get idProjet
     *
     * @return string
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }
}

